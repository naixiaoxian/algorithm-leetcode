<?php

namespace Tests\Unit;

use phpDocumentor\Reflection\Element;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class Day2Test extends TestCase {
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSortedSquares () {
        $nums = [-4, -1, 0, 3, 10];
        $nums2 = [-7, -3, 2, 3, 11];
        dump($this->sortedSquares($nums2));
    }

    public function sortedSquares ($nums) {
        $left = 0;
        $right = count($nums) - 1;
        $ret = $nums;
        $write = count($nums) - 1;
        while ($left <= $right) {
            if ($nums[$left] * $nums[$left] > $nums[$right] * $nums[$right]) {
                $ret[$write] = $nums[$left] * $nums[$left];
                $left++;
            } else {
                $ret[$write] = $nums[$right] * $nums[$right];
                $right--;
            }
            dump("___", $ret);
            $write--;
        }
        return $ret;
        //二分查找
    }

    public function testRotate () {
        $nums = [1, 2, 3, 4, 5, 6, 7];
        $k = 1;
        dump($this->rotate($nums, $k));
    }

    public function rotate (&$nums, $k) {
        dump($nums);
        //        $left = array_slice($nums, count($nums) - $k + 1, $k, true);
        //        $right = array_slice($nums, 0, count($nums) - $k, true);
        //        return array_merge($left, $right);
        $ret = $nums;
        $len = count($nums);
        for ($i = 0; $i < $len; $i++) {
            $ret[($i + $k) % $len] = $nums[$i];
        }
        $nums = $ret;
        return $nums;
    }


}
