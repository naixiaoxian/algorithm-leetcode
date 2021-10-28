<?php

namespace Tests\Unit;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Element;
use phpDocumentor\Reflection\Types\True_;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class OneHundredTest extends TestCase {
    //leetcode刷题。从1-100题


    public function test33 () {
        dd($this->searchRange([3, 3, 3], 3));
    }


    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search ($nums, $target) {
        //先找数。再旋转
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] == $target) {
                return $i;
            }
        }
        return -1;
    }


    public function test34 () {
        dd($this->searchRange([3, 3, 3], 3));
    }

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange ($nums, $target) {

        $selectIndex = $this->getIndex($nums, $target);
        if ($selectIndex == -1) {
            return [-1, -1];
        }
        $left = $selectIndex;
        $right = $selectIndex;

        for ($i = 0; $i <= count($nums) - 1; $i++) {
            if (isset($nums[$selectIndex - $i]) && $nums[$selectIndex - $i] == $target) {
                $left = $selectIndex - $i;
            }
            if (isset($nums[$selectIndex + $i]) && $nums[$selectIndex + $i] == $target) {
                $right = $selectIndex + $i;
            }
        }
        return [$left, $right];
    }

    function getIndex ($nums, $target) {
        $left = 0;
        $right = count($nums) - 1;
        $ret = -1;
        while ($left <= $right && $ret == -1) {
            if ($nums[$left] == $target) {
                return $left;
            }
            if ($nums[$right] == $target) {
                return $right;
            }
            $mid = $left + (int)(($right - $left) / 2);
            if ($target > $nums[$mid]) {
                $left = $mid;
            } else if ($target < $nums[$mid]) {
                $right = $mid;
            }
            if ($target == $nums[$mid]) {
                $ret = $mid;
                break;
            }
            if ($left == $right - 1 || $left == $right) {
                break;
            }
        }
        return $ret;
    }


    public function test66 () {
        //给定一个由 整数 组成的 非空 数组所表示的非负整数，在该数的基础上加一。
        //最高位数字存放在数组的首位， 数组中每个元素只存储单个数字。
        //你可以假设除了整数 0 之外，这个整数不会以零开头
        $input = [9];
        dd($this->plusOne($input));
    }

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne (array $digits): array {
        $num = 1;
        $index = count($digits) - 1;
        while ($num) {
            $num--;
            if ($index < 0) {
                array_unshift($digits, 1);
            } else {
                $addNum = $digits[$index] + 1;
                if ($addNum == 10) {
                    //进位操作
                    $digits[$index] = 0;
                    $index--;
                    $num++;
                } else {
                    $digits[$index] = $addNum;
                }
            }
        }
        return $digits;
    }

    function plusOneFollish ($digits) {
        //转化为整数 +1
        //转化为数组
        //倒序转换
        //在大数的处理过程中容易出现问题。因此需要模拟进位操作。
        //        $num = 0;
        //        $mulNum = 1;
        //        for ($i = count($digits) - 1; $i >= 0; $i--) {
        //            $num = bcadd($num, bcmul($digits[$i], $mulNum));
        //            $mulNum = $mulNum * 10;
        //        }
        //        $num += 1;
        //        dump($num);
        //        $ret = [];
        //        while ($num > 0) {
        //            $modNum = $num % 10;
        //            $num = bcdiv($num, 10);
        //            $ret[] = $modNum;
        //        }
        //        $ret2 = [];
        //        for ($i = 0; $i < count($ret); $i++) {
        //            $ret2[] = $ret[count($ret) - 1 - $i];
        //        }
        //        return $ret2;
    }


    public function test74 () {
        dump($this->searchMatrix74([[0]], 1));
    }

    function searchMatrix74 ($matrix, $target) {
        //        way1
        //        $cL = count($matrix);
        //        $rL = count($matrix[0]);
        //        for ($i = 0; $i < $cL; $i++) {
        //            if ($matrix[$i][0] > $target) {
        //                unset($matrix[$i]);
        //            } else if ($matrix[$i][$rL - 1] < $target) {
        //                unset($matrix[$i]);
        //            }
        //        }
        //
        //        foreach ($matrix as $rowValue) {
        //            foreach ($rowValue as $colValue) {
        //                if ($colValue == $target) {
        //                    return true;
        //                }
        //            }
        //        }
        //        return false;
        //way2
        //行删除
        $selectRow = count($matrix) - 1;
        for ($i = 0; $i < count($matrix); $i++) {
            if ($matrix[$i][0] == $target) {
                return true;
            }
            if (isset($matrix[$i + 1]) && ($matrix[$i + 1][0] > $target && $matrix[$i][0] < $target)) {
                $selectRow = $i;
                break;
            }
        }
        for ($i = 0; $i < count($matrix[0]); $i++) {
            if ($matrix[$selectRow][$i] == $target) {
                return true;
            }
        }
        return false;
    }

}
