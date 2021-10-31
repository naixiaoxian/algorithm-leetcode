<?php

namespace Tests\Unit;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Element;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function MongoDB\Driver\Monitoring\removeSubscriber;


class Day7Test extends TestCase {

    //733 图像渲染
    //有一幅以二维整数数组表示的图画，每一个整数表示该图画的像素值大小，数值在 0 到 65535 之间。
    //给你一个坐标 (sr, sc) 表示图像渲染开始的像素值（行 ，列）和一个新的颜色值 newColor，让你重新上色这幅图像。
    //为了完成上色工作，从初始坐标开始，记录初始坐标的上下左右四个方向上像素值与初始坐标相同的相连像素点，接着再记录这四个方向
    //上符合条件的像素点与他们对应四个方向上像素值与初始坐标相同的相连像素点，……，重复该过程。将所有有记录的像素点的颜色值改为新的颜色值。
    //最后返回经过上色渲染后的图像。
    public function testFloodFill () {
        $image = [[1, 0, 0], [0, 1, 0]];
        $sr = 1;
        $sc = 0;
        $newColor = 3;
        dump($this->floodFill($image, $sr, $sc, $newColor));
    }


    function floodFill ($image, $sr, $sc, $newColor) {
        //左右上下
        //找到所有复合要求的点
        //变颜色
        $this->draw($sr, $sc, $image, $image[$sr][$sc], $newColor);
        return $image;
    }

    //DFS 深度优先
    function draw ($sr, $sc, &$image, $targetColor, $newColor) {
        if ($sr < 0 || $sr + 1 > count($image) || $sc < 0 || $sc + 1 > count($image[0])) {
        } else {
            if ($targetColor == $newColor) {
                //目标值相等则返回
                return;
            } else if ($targetColor == $image[$sr][$sc]) {
                $image[$sr][$sc] = $newColor;
                $this->draw($sr, $sc - 1, $image, $targetColor, $newColor);
                $this->draw($sr, $sc + 1, $image, $targetColor, $newColor);
                $this->draw($sr - 1, $sc, $image, $targetColor, $newColor);
                $this->draw($sr + 1, $sc, $image, $targetColor, $newColor);
            }
        }
    }
    //到时候利用广度优先来做第二次测试。


    //695
    //给你一个大小为 m x n 的二进制矩阵 grid 。
    //岛屿 是由一些相邻的 1 (代表土地) 构成的组合，这里的「相邻」
    //要求两个 1 必须在 水平或者竖直的四个方向上 相邻。你可以假设 grid
    //的四个边缘都被 0（代表水）包围着。
    //岛屿的面积是岛上值为 1 的单元格的数目。
    //计算并返回 grid 中最大的岛屿面积。如果没有岛屿，则返回面积为 0 。
    function testMaxAreaLand () {
        $arr = [
            [0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0],
            [0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0],
            [0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 1, 0, 0],
            [0, 1, 0, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0],
        ];
        dump($this->maxAreaOfIsland($arr));
    }

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxAreaOfIsland ($grid) {
        //
        $index = 0;
        $landMap = [];
        for ($i = 0; $i < count($grid); $i++) {
            for ($j = 0; $j < count($grid[0]); $j++) {
                $this->getIsland($i, $j, $grid, $landMap, $index);
                $index++;
            }
        }
        $max = 0;
        foreach ($landMap as $value) {
            if ($max < count($value)) {
                $max = count($value);
            }
        }
        return $max;
    }

    //判断是否在岛屿内。
    //获取对应岛屿
    function getIsland ($sr, $sc, &$grid, &$landMap, $landIndex) {
        if ($sr < 0 || $sr + 1 > count($grid) || $sc < 0 || $sc + 1 > count($grid[0])) {
            //边界return
        } else {
            if ($grid[$sr][$sc] == 0) {
                //边界return
                return;
            } else if ($grid[$sr][$sc] == 1) {
                $grid[$sr][$sc] = 0;
                $landMap[$landIndex][] = "$sr,$sc";
                $this->getIsland($sr, $sc - 1, $grid, $landMap, $landIndex);
                $this->getIsland($sr, $sc + 1, $grid, $landMap, $landIndex);
                $this->getIsland($sr - 1, $sc, $grid, $landMap, $landIndex);
                $this->getIsland($sr + 1, $sc, $grid, $landMap, $landIndex);
            }
        }
    }

    function maxAreaOfIsland2 ($grid) {
        //
        $MaxArea = 0;
        for ($i = 0; $i < count($grid); $i++) {
            for ($j = 0; $j < count($grid[0]); $j++) {
                $area = $this->returnIsland($i, $j, $grid);
                if ($MaxArea < $area) {
                    $MaxArea = $area;
                }
            }
        }
        return $MaxArea;
    }

    //判断是否在岛屿内。
    //获取对应岛屿
    function returnIsland ($sr, $sc, &$grid) {
        if ($sr < 0 || $sr + 1 > count($grid) || $sc < 0 || $sc + 1 > count($grid[0])) {
            //边界return
            return 0;
        } else {
            if ($grid[$sr][$sc] == 0) {
                //边界return
                return 0;
            } else if ($grid[$sr][$sc] == 1) {
                $grid[$sr][$sc] = 0;
                return 1 +
                    $this->returnIsland($sr, $sc - 1, $grid) +
                    $this->returnIsland($sr, $sc + 1, $grid) +
                    $this->returnIsland($sr - 1, $sc, $grid) +
                    $this->returnIsland($sr + 1, $sc, $grid);
            }
        }
    }


}
