<?php

namespace Tests\Unit;

use Mockery\Matcher\NoArgs;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Element;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function MongoDB\Driver\Monitoring\removeSubscriber;


class Day8Test extends TestCase {

    //617. 合并二叉树
    //给定两个二叉树，想象当你将它们中的一个覆盖到另一个上时，两个二叉树的一些节点便会重叠。
    //你需要将他们合并为一个新的二叉树。合并的规则是如果两个节点重叠，
    //那么将他们的值相加作为节点合并后的新值，否则不为NULL 的节点将直接作为新二叉树的节点。

    public function testMergeTrees () {
        $root1 = new TreeNode(1, new TreeNode(3, new TreeNode(5)), new TreeNode(2));
        $root2 = new TreeNode(2, new TreeNode(1, null, new TreeNode(4)), new TreeNode(3, null, new TreeNode(7)));
        dump($this->mergeTrees($root1, $root2));
    }

    //    function createTree ($array) {
    //        $count = 0;
    //        $root = new TreeNode();
    //        while ($count < count($array)) {
    //
    //        }
    //    }

    /**
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return TreeNode
     */
    function mergeTrees ($root1, $root2) {
        $this->mergeNode($root1, $root2, $newNode);
        return $newNode;
    }

    /**
     * @param TreeNode $node1
     * @param TreeNode $node2
     * @param TreeNode $newNode
     */
    function mergeNode (TreeNode $node1 = null, TreeNode $node2 = null, TreeNode &$newNode = null) {
        if (!$node1 && !$node2) {
            return;
        } else {
            $newNode = new TreeNode();
            if ($node1 && !$node2) {
                $newNode->val = $node1->val;
                $this->mergeNode($node1->left, null, $newNode->left);
                $this->mergeNode($node1->right, null, $newNode->right);
            } else if (!$node1 && $node2) {
                $newNode->val = $node2->val;
                $this->mergeNode(null, $node2->left, $newNode->left);
                $this->mergeNode(null, $node2->right, $newNode->right);
            } else {
                $newNode->val = $node1->val + $node2->val;
                $this->mergeNode($node1->left, $node2->left, $newNode->left);
                $this->mergeNode($node1->right, $node2->right, $newNode->right);
            }
        }
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

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct ($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}
