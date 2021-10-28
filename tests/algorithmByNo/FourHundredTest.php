<?php

namespace Tests\Unit;

use Hamcrest\Core\Set;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Element;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class FourHundredTest extends TestCase {
    //leetcode刷题。从301-400题


    public function test301 () {
        dd($this->removeInvalidParentheses("a()()("));
    }

    /**
     * @param String $s
     * @return String[]
     */
    function removeInvalidParentheses ($s) {
        $ans = [];
        $currSet = [$s => $s];
        dump($currSet);
        while (true) {
            foreach ($currSet as $value) {
                if ($this->isValid($value)) {
                    $ans[$value] = $value;
                }
            }
            if (count($ans) > 0) {
                return $ans;
            }
            $nextSet = '';
            foreach ($currSet as $item) {
                for ($i = 0; $i < strlen($item); $i++) {
                    if ($i > 0 && $item[$i] == $item[$i - 1]) {
                        continue;
                    }
                    if ($item[$i] == '(' || $item[$i] == ')') {
                        $nextSet = $nextSet.substr($item, 0, $i).substr($item, $i + 1);
                    }
                }
            }
            $currSet[$nextSet] = $nextSet;
        }
    }

    public function isValid (string $s): bool {
        $count = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] == '(') {
                $count++;
            } else if ($s[$i] == ')') {
                $count--;
                if ($count < 0) {
                    return false;
                }
            }
        }
        return $count == 0;
    }

    //public List<String> removeInvalidParentheses(String s) {
    //List<String> ans = new ArrayList<String>();
    //Set<String> currSet = new HashSet<String>();
    //
    //currSet.add(s);
    //while (true) {
    //for (String str : currSet) {
    //if (isValid(str)) {
    //ans.add(str);
    //}
    //}
    //if (ans.size() > 0) {
    //    return ans;
    //}
    //Set<String> nextSet = new HashSet<String>();
    //            for (String str : currSet) {
    //                for (int i = 0; i < str.length(); i ++) {
    //                    if (i > 0 && str.charAt(i) == str.charAt(i - 1)) {
    //                        continue;
    //                    }
    //                    if (str.charAt(i) == '(' || str.charAt(i) == ')') {
    //                        nextSet.add(str.substring(0, i) + str.substring(i + 1));
    //                    }
    //                }
    //            }
    //            currSet = nextSet;
    //        }
    //    }
    //
    //    private boolean isValid(String str) {
    //                    char[] ss = str.toCharArray();
    //        int count = 0;
    //
    //        for (char c : ss) {
    //            if (c == '(') {
    //                count++;
    //            } else if (c == ')') {
    //                count--;
    //                if (count < 0) {
    //                    return false;
    //                }
    //            }
    //        }
    //
    //        return count == 0;
    //    }


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


    public
    function test496 () {
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
