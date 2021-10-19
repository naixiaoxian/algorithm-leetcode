<?php

namespace Tests\Unit;

use phpDocumentor\Reflection\Element;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase {
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest () {
        $this->assertTrue(true);
    }

    public function searchDeviceTest () {
        $arr = [5];
        $target = 5;

        $ret = $this->search($arr, $target);
        dump($ret);
        //二分查找
    }

    public function search ($nums, $target) {
        $left = 0;
        $right = count($nums) - 1;
        $ret = -1;
        while ($left <= $right) {
            $mid = (int)($left + ($right - $left) / 2);
            if ($target > $nums[$mid]) {
                $left = $mid;
            } else if ($target < $nums[$mid]) {
                $right = $mid;
            } else if ($target == $nums[$mid]) {
                $ret = $mid;
                break;
            }
            if ($nums[$left] == $target) {
                $ret = $left;
                break;
            }
            if ($nums[$right] == $target) {
                $ret = $right;
                break;
            }
            if ($left + 1 >= $right) {
                break;
            }
        }
        return $ret;

    }

    public function testFirstBadVersion () {
        self::$badNum = 5;
        $target = 11;

        $ret = $this->firstBadVersion($target);
        dump("finally_".$ret);
        //二分查找
    }

    public static $badNum = 4;

    public function isBadVersion ($bad) {
        return self::$badNum <= $bad;
    }

    public function firstBadVersion ($n) {
        $left = 1;
        $right = $n;
        while ($left < $right) {
            $mid = round($left + ($right - $left) / 2, 0);
            if ($this->isBadVersion($mid)) {
                $right = $mid;
            } else {
                $left = $mid;
            }
            if ($left + 1 >= $right) {
                break;
            }
        }
        if ($this->isBadVersion($left)) {
            return $left;
        } else if ($this->isBadVersion($right)) {
            return $right;
        }
    }

    public function testSearchInsert () {
        self::$badNum = 5;
        $target = 11;

        $ret = $this->firstBadVersion($target);
        dump("finally_".$ret);
        //二分查找
    }

    public function searchInsert ($nums, $target) {
        $left = 0;
        $right = count($nums) - 1;
        while ($left < $right) {
            $mid = round($left + ($right - $left) / 2, 0);
            if ($target > $nums[$mid]) {
                $left = $mid;
            } else if ($target < $nums[$mid]) {
                $right = $mid;
            } else {
                return $mid;
            }
            if ($left + 1 >= $right) {
                break;
            }
        }
        if ($nums[$right] < $target) {
            return $right + 1;
        } else if ($nums[$left] < $target) {
            return $right;
        } else if ($target == $nums[$left]) {
            return $left;
        } else if ($target < $nums[$left]) {
            return max($left - 1, 0);
        }
    }

}
