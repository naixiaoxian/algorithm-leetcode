<?php

namespace Tests\Unit;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Element;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class FiveHundredTest extends TestCase {
    //leetcode刷题。从401-500题


    public function test429 () {
        //492. 构造矩形
        //作为一位web开发者， 懂得怎样去规划一个页面的尺寸是很重要的。 现给定一个具体的矩形页面面积，
        //你的任务是设计一个长度为 L 和宽度为 W 且满足以下要求的矩形的页面。要求：
        //1. 你设计的矩形页面必须等于给定的目标面积。
        //2. 宽度 W 不应大于长度 L，换言之，要求 L >= W 。
        //3. 长度 L 和宽度 W 之间的差距应当尽可能小。
        //你需要按顺序输出你设计的页面的长度 L 和宽度 W。
        //思路 根据平方根来做计算。然后做递减
        dd($this->constructRectangle(5));
    }

    /**
     * @param Integer $area
     * @return Integer[]
     */
    function constructRectangle ($area) {
        $clamp1 = $clamp2 = (int)sqrt($area);
        while ($clamp1 * $clamp2 != $area) {
            $clamp1++;

            $clamp2 = (int)($area / $clamp1);
        }
        return [$clamp1, $clamp2];
    }


    public function test496 () {
        //496. 下一个更大元素 I
        //给你两个 没有重复元素 的数组nums1 和nums2，其中nums1是nums2的子集。
        //
        //请你找出 nums1中每个元素在nums2中的下一个比其大的值。
        //nums1中数字x的下一个更大元素是指x在nums2中对应位置的右边的第一个比x大的元素。如果不存在，对应位置输出 -1

        dd($this->nextGreaterElement([4, 1, 2], [1, 3, 4, 2]));
    }

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function nextGreaterElement ($nums1, $nums2) {
        $retArr = [];
        for ($i = 0; $i < count($nums1); $i++) {
            $curretNum = -1;
            $startIndex = $this->findIndex($nums1[$i], $nums2);
            for ($j = $startIndex + 1; $j < count($nums2); $j++) {
                if ($nums2[$j] > $nums1[$i]) {
                    $curretNum = $nums2[$j];
                    break;
                }
            }
            array_push($retArr, $curretNum);
        }
        return $retArr;
    }

    function findIndex ($value, array $nums2): int {
        for ($i = 0; $i < count($nums2); $i++) {
            if ($value == $nums2[$i]) {
                return $i;
            }
        }
        return -1;
    }


}
