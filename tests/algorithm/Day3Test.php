<?php

namespace Tests\Unit;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Element;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class Day3Test extends TestCase {

    //给定一个数组 nums，编写一个函数将所有 0 移动到数组的末尾，同时保持非零元素的相对顺序。
    //示例:
    //输入: [0,1,0,3,12]
    //输出: [1,3,12,0,0]

    public function testMoveZero () {
        $input = [0, 1, 0, 3, 12];
        dd($this->moveZero($input));
    }

    public function moveZero (&$nums) {
        //注意这个双指针的逻辑。用两个变量来处理一定的值
        //左指针指向当前已经处理好的序列的尾部，右指针指向待处理序列的头部。
        //右指针不断向右移动，每次右指针指向非零数，则将左右指针对应的数交换，同时左指针右移。
        $temp = 0;
        $len = count($nums);
        $left = 0;
        $right = 0;
        while ($right < $len) {
            if ($nums[$right]) {
                $temp = $nums[$left];
                $nums[$left] = $nums[$right];
                $nums[$right] = 0;
                $left++;
            }
            $right++;
        }
        return $nums;

        //
        //        $ret = [];
        //        $len = count($nums);
        //        for ($i = 0; $i < $len; $i++) {
        //            if ($nums[$i]) {
        //                $ret[] = $nums[$i];
        //            }
        //        }
        //        for ($i = count($ret); $i < $len; $i++) {
        //            $ret[] = 0;
        //        }
        //        $nums = $ret;
        //        return $nums;
    }

    public function testTwoSum () {
        $arr = [2, 7, 11, 15];
        $num = 18;
        dump($this->twoSum($arr, $num));
    }
    //
    //初始时两个指针分别指向第一个元素位置和最后一个元素的位置。每次计算两个指针指向的两个元素之和，并和目标值比较。
    //如果两个元素之和等于目标值，则发现了唯一解。如果两个元素之和小于目标值，则将左侧指针右移一位。如果两个元素之和
    //大于目标值，则将右侧指针左移一位。移动指针之后，重复上述操作，直到找到答案。
    //使用双指针的实质是缩小查找范围。那么会不会把可能的解过滤掉？答案是不会。
    //假设 \textit{numbers}[i]+\textit{numbers}[j]=\textit{target}numbers[i]+numbers[j]=target 是唯一解，
    //其中 0 \leq i<j \leq \textit{numbers}.\textit{length}-10≤i<j≤numbers.length−1。初始时两个指针分别指
    //向下标 00 和下标 \textit{numbers}.\textit{length}-1numbers.length−1，左指针指向的下标小于或等于 ii，右指
    //针指向的下标大于或等于 jj。除非初始时左指针和右指针已经位于下标 ii 和 jj，否则一定是左指针先到达下标 ii 的位置或者
    //右指针先到达下标 jj 的位置。
    //如果左指针先到达下标 ii 的位置，此时右指针还在下标 jj 的右侧，\textit{sum}>\textit{target}sum>target，因此
    //一定是右指针左移，左指针不可能移到 ii 的右侧。
    //如果右指针先到达下标 jj 的位置，此时左指针还在下标 ii 的左侧，\textit{sum}<\textit{target}sum<target，因此
    //一定是左指针右移，右指针不可能移到 jj 的左侧。

    public function twoSum (array $numbers, int $target) {
        $low = 0;
        $high = count($numbers) - 1;
        while ($low < $high) {
            $res = $numbers[$low] + $numbers[$high];
            if ($res == $target) {
                return [$low + 1, $high + 1];
            } else if ($res < $target) {
                $low++;
            } else {
                $high--;
            }
        }
        return [];
    }
}
