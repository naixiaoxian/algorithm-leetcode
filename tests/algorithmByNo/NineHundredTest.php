<?php

namespace Tests\Unit;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Element;
use phpDocumentor\Reflection\Types\True_;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class NineHundredTest extends TestCase {
    //leetcode刷题。从101-200题


    public function test869 () {

        $arr = [1, 10, 16, 24, 46];
        foreach ($arr as $value) {
            dump($this->reorderedPowerOf2($value));
        }
    }

    /**
     * @param Integer $n
     * @return Boolean
     */
    function reorderedPowerOf2 ($n) {
        $numArr = $this->getArr($n);
        $num = 1;
        while (true) {
            $arr2 = $this->getArr($num);
            if (count($arr2) > count($numArr)) {
                break;
            }
            $ret = $this->isEqual($numArr, $arr2);
            if ($ret) {
                return true;
            }
            $num = $num * 2;
        }
        return false;
    }


    function getArr ($nums) {
        $ret = [];
        while ($nums != 0) {
            array_push($ret, $nums % 10);
            $nums = floor($nums / 10);
        }
        return $ret;
    }

    function isEqual ($arr1, $arr2): bool {
        foreach ($arr1 as $key1 => $value1) {
            foreach ($arr2 as $key2 => $value2) {
                if ($value1 == $value2) {
                    unset($arr2[$key2]);
                    unset($arr1[$key1]);
                    break;
                }
            }
            if (count($arr1) == 0 && count($arr2) == 0) {
                return true;
            }
        }
        return false;
    }

}
