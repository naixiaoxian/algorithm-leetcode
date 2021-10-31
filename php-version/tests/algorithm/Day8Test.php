<?php

namespace Tests\Unit;

use Mockery\Matcher\NoArgs;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Element;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function MongoDB\Driver\Monitoring\removeSubscriber;


class Day8Test extends TestCase {

    //542. 01 矩阵
    //给定一个由 0 和 1 组成的矩阵 mat，请输出一个大小相同的矩阵，其中每一个格子是 mat 中对应位置元素到最近的 0 的距离。
    //
    //两个相邻元素间的距离为 1 。
    //BFS 广度优先 Breadth-First Search DFS 深度优先
    //用广度优先算法实现该功能。用动态规划的办法去重新更新该方法。
    public function testUpdateMatrix () {
        dump($this->updateMatrix([[0], [0], [0], [0], [0]]));
    }


    /**
     * @param array $mat
     * @return array
     */
    function updateMatrix ($mat) {
        $dirs = [[-1, 0], [1, 0], [0, -1], [0, 1]];

        $seen = $mat;
        $dist = $mat;
        $oneQueue = [];

        for ($i = 0; $i < count($mat); $i++) {
            for ($j = 0; $j < count($mat[0]); $j++) {
                if ($mat[$i][$j] == 0) {
                    $seen[$i][$j] = 1;
                    array_push($oneQueue, [$i, $j]);
                } else {
                    $seen[$i][$j] = 0;
                }
                $dist[$i][$j] = 0;
            }
        }
        while (count($oneQueue) > 0) {
            $value = array_shift($oneQueue);
            $selecti = $value[0];
            $selectj = $value[1];
            for ($d = 0; $d < 4; $d++) {
                $ni = $selecti + $dirs[$d][0];
                $nj = $selectj + $dirs[$d][1];
                if ($ni >= 0 && $ni < count($mat) && $nj >= 0 && $nj < count($mat[0]) && !$seen[$ni][$nj]) {
                    $dist[$ni][$nj] = $dist[$selecti][$selectj] + 1;
                    array_push($oneQueue, [$ni, $nj]);
                    $seen[$ni][$nj] = 1;
                }
            }
        }

        return $dist;

    }
    //994. 腐烂的橘子
    //在给定的网格中，每个单元格可以有以下三个值之一：
    //值0代表空单元格；
    //值1代表新鲜橘子；
    //值2代表腐烂的橘子。
    //每分钟，任何与腐烂的橘子（在 4 个正方向上）相邻的新鲜橘子都会腐烂。
    //
    //返回直到单元格中没有新鲜橘子为止所必须经过的最小分钟数。如果不可能，返回 -1。


    public function testOrinage () {
        dump($this->orangesRotting([
            [2, 0, 1, 1, 1, 1, 1, 1, 1, 1],
            [2, 0, 1, 0, 0, 0, 0, 0, 0, 1],
            [2, 0, 1, 0, 1, 1, 1, 1, 0, 1],
            [2, 0, 1, 0, 1, 0, 0, 1, 0, 1],
            [2, 0, 1, 0, 1, 0, 0, 1, 0, 1],
            [2, 0, 1, 0, 1, 1, 0, 1, 0, 1],
            [2, 0, 1, 0, 0, 0, 0, 1, 0, 1],
            [2, 0, 1, 1, 1, 1, 1, 1, 0, 1],
            [2, 0, 0, 0, 0, 0, 0, 0, 0, 1],
            [2, 2, 2, 2, 2, 2, 2, 1, 1, 1],
        ]));
    }

    function orangesRotting ($grid) {
        $dr = [-1, 0, 1, 0];
        $dc = [0, -1, 0, 1];
        $RL = count($grid);
        $CL = count($grid[0]);
        $queue = [];
        $depMap = [];
        for ($r = 0; $r < $RL; $r++) {
            for ($c = 0; $c < $CL; $c++) {
                if ($grid[$r][$c] == 2) {
                    $code = $r * $CL + $c;
                    array_push($queue, $code);
                    $depMap[$code] = 0;
                }
            }
        }
        $ans = 0;
        while (count($queue) > 0) {
            $code = array_shift($queue);
            $cr = (int)($code / $CL);
            $cc = $code % $CL;
            for ($k = 0; $k < 4; $k++) {
                $nr = $cr + $dr[$k];
                $nc = $cc + $dc[$k];
                if (0 <= $nr && $nr < $RL && 0 <= $nc && $nc < $CL && $grid[$nr][$nc] == 1) {
                    $grid[$nr][$nc] = 2;
                    $nNode = $nr * $CL + $nc;
                    array_push($queue, $nNode);
                    $depMap[$nNode] = $depMap[$code] + 1;
                    $ans = $depMap[$nNode];
                }
            }
        }
        for ($r = 0; $r < $RL; $r++) {
            for ($c = 0; $c < $CL; $c++) {
                if ($grid[$r][$c] == 1) {
                    return -1;
                }
            }
        }
        return $ans;
    }


}
