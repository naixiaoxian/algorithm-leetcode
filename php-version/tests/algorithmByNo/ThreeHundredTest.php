<?php

namespace Tests\Unit;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Element;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class OneHundredTest extends TestCase {
    //leetcode刷题。从201-300题


    public function test229 () {
        //求众数 II
        //给定一个大小为 n 的整数数组，找出其中所有出现超过 ⌊ n/3 ⌋ 次的元素。
        //最高位数字存放在数组的首位， 数组中每个元素只存储单个数字。
        //你可以假设除了整数 0 之外，这个整数不会以零开头
        dd($this->majorityElement([3, 2, 3]));
    }

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function majorityElement (array $nums): array {
        $arrCountMap = [];
        $retArr = [];
        $len = floor(count($nums) / 3);
        for ($i = 0; $i < count($nums); $i++) {
            if (!isset($arrCountMap[$nums[$i]])) {
                $arrCountMap[$nums[$i]] = 1;
            } else {
                $arrCountMap[$nums[$i]]++;
            }
            if ($arrCountMap[$nums[$i]] > $len && !in_array($nums[$i], $retArr)) {
                $retArr[] = $nums[$i];
            }
        }
        return $retArr;
    }

    public function test240 () {
        //240. 搜索二维矩阵 II
        //编写一个高效的算法来搜索 m x n 矩阵 matrix 中的一个目标值 target 。该矩阵具有以下特性
        //每行的元素从左到右升序排列。
        //每列的元素从上到下升序排列。
        //二分查找。广度优先
        dd($this->searchMatrix([[1, 4, 7, 11, 15], [2, 5, 8, 12, 19], [3, 6, 9, 16, 22], [10, 13, 14, 17, 24], [18, 21, 23, 26, 30]], 20));
    }

    function searchMatrix ($matrix, $target) {
        //两个二分
        for ($i = count($matrix) - 1; $i > 0; $i--) {
            if ($matrix[$i][0] > $target) {
                unset($matrix[$i]);
            } elseif ($matrix[$i][count($matrix[0]) - 1] < $target) {
                unset($matrix[$i]);
            }
        }

        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix[0]); $j++) {
                if ($target == $matrix[$i][$j]) {
                    return true;
                }
            }
        }
        return false;
    }

}
