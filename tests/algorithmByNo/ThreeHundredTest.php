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


}
