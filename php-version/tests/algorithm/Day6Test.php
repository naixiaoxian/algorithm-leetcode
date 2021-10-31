<?php

namespace Tests\Unit;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Element;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function MongoDB\Driver\Monitoring\removeSubscriber;


class Day6Test extends TestCase {

    //给定一个字符串 s ，请你找出其中不含有重复字符的 最长子串 的长度。

    public function testLengthOfLongestSubstring () {
        dump(preg_match('/.*(.)(.*\1).*/', '   '));
        dump($this->lengthOfLongestSubstring(" "));
    }


    public function lengthOfLongestSubstring ($s): int {
        $left = 0;
        $right = 1;
        $count = strlen($s);
        $maxLength = 0;
        while ($right <= $count) {
            $checkStr = substr($s, $left, $right - $left);
            if (!preg_match('/.*(.)(.*\1).*/', $checkStr)) {
                if ($maxLength < $right - $left) {
                    $maxLength = $right - $left;
                }
                $right++;
            } else {
                $left++;
            }
        }
        return $maxLength;
    }


    //给你两个字符串s1和s2 ，写一个函数来判断 s2 是否包含 s1的排列。如果是，返回 true ；否则，返回 false 。
    //
    //换句话说，s1 的排列之一是 s2 的 子串 。
    //
    public function testCheckInclusion () {
        dump($this->checkInclusion("le", "hello"));
    }

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function checkInclusion ($s1, $s2) {
        //数组排序 这样子超时了。不知道为什么
        //        $arr1 = str_split($s1);
        //        $arr2 = str_split($s2);
        //        $len = count($arr1);
        //        $len2 = count($arr2);
        //        $right = 0;
        //        asort($arr1);
        //        while ($right <= $len2 - $len) {
        //            $nowArr = array_slice($arr2, $right, $len);
        //            asort($nowArr);
        //            if (array_values($nowArr) == array_values($arr1)) {
        //                return true;
        //            }
        //            $right++;
        //        }
        //        return false;

        $checkArr = $this->getArrNum($s1);
        $right = 0;
        $len = strlen($s1);
        $len2 = strlen($s2);
        while ($right <= $len2 - $len) {
            $nowStr = substr($s2, $right, $len);
            $nowArr = $this->getArrNum($nowStr);
            if (!array_diff_assoc($nowArr, $checkArr)) {
                return true;
            }
            $right++;
        }
        return false;
    }

    public function getArrNum ($str): array {
        $i = 0;
        $retArr = [];
        while ($i < strlen($str)) {
            if (!isset($retArr[$str[$i]])) {
                $retArr[$str[$i]] = 1;
            } else {
                $retArr[$str[$i]]++;
            }
            $i++;
        }
        return $retArr;
    }

}
