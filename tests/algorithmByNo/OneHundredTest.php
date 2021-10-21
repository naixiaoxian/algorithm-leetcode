<?php

namespace Tests\Unit;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Element;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class OneHundredTest extends TestCase {
    //leetcode刷题。从1-100题


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


}
