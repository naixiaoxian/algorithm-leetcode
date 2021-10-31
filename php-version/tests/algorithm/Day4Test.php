<?php

namespace Tests\Unit;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Element;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class Day4Test extends TestCase {

    //编写一个函数，其作用是将输入的字符串反转过来。输入字符串以字符数组 s 的形式给出。
    //不要给另外的数组分配额外的空间，你必须原地修改输入数组、使用 O(1) 的额外空间解决这一问题。
    //输入：s = ["h","e","l","l","o"]
    //输出：["o","l","l","e","h"]

    public function testReverseString () {
        $input = "hello";
        dd($this->reverseString($input));
    }

    function reverseString (&$s) {
        $len = count($s) - 1;
        for ($i = 0; $i < $len / 2; $i++) {
            $temp = $s[$i];
            $s[$i] = $s[$len - $i];
            $s[$len - $i] = $temp;
        }
        return $s;
    }

    public function testReverseWords () {
        $input = "hello iam kaiduo";

        dd($this->reverseWords($input));
    }

    function reverseWords ($s) {
        $arrs = explode(" ", $s);
        $ret = $arrs;
        for ($i = 0; $i < count($arrs); $i++) {
            $ret[$i] = $this->reverseString2(str_split($arrs[$i]));
        }
        return implode(" ", $ret);
    }

    function reverseString2 ($s): string {
        $len = count($s) - 1;
        for ($i = 0; $i < $len / 2; $i++) {
            $temp = $s[$i];
            $s[$i] = $s[$len - $i];
            $s[$len - $i] = $temp;
        }
        return implode($s);
    }


}
