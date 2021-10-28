<?php

namespace Tests\Unit;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Element;
use phpDocumentor\Reflection\Types\True_;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class TwoHandredTest extends TestCase {
    //leetcode刷题。从101-200题


    public function test153 () {
        dd($this->findMin([0, 1, 3]));
    }

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin ($nums) {
        $left = 0;
        $right = count($nums) - 1;
        while ($left < $right) {
            $mid = $left + (int)(($right - $left) / 2);
            if ($nums[$mid] < $nums[$right]) {
                $right = $mid;
            } else {
                $left = $left + 1;
            }
        }
        return $nums[$left];
    }


    public function test162 () {
        dd($this->findPeakElement([1, 2, 1, 3, 5, 6, 4]));
    }


    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findPeakElement ($nums) {
        if (count($nums) == 1) {
            return 0;
        }
        for ($i = 0; $i < count($nums); $i++) {
            if (!isset($nums[$i - 1]) && isset($nums[$i])) {
                if ($nums[$i] > $nums[$i + 1]) {
                    return $i;
                }
            } else if (isset($nums[$i]) && !isset($nums[$i + 1])) {
                if ($nums[$i] > $nums[$i - 1]) {
                    return $i;
                }
            } else {
                if ($nums[$i] > $nums[$i - 1] && $nums[$i] > $nums[$i + 1]) {
                    return $i;
                }
            }
        }
    }
}
