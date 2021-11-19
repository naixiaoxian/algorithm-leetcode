<?php

namespace Tests\Unit;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Element;
use SebastianBergmann\CodeCoverage\Report\Xml\Node;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function MongoDB\Driver\Monitoring\removeSubscriber;


class Day10Test extends TestCase {

    //给定两个整数 n 和 k，返回范围 [1, n] 中所有可能的 k 个数的组合。
    //你可以按 任何顺序 返回答案。
    //77. 组合
    public function testCombine () {
        dump($this->combine(4, 2));
    }

    function combine ($n, $k) {
        $this->dfs(1, $n, $k);
        return $this->ret;
    }

    function dfs ($u, $n, $k) {
        //        dump(__LINE__."--dfs "."u=".$u."n=".$n."k=".$k);
        if ($k == 0) {
            array_push($this->ret, $this->path);
            return;
        }
        for ($i = $u; $i <= $n - $k + 1; $i++) {
            array_unshift($this->path, $i);
            //            dump(__LINE__."--".json_encode($this->path));
            $this->dfs($i + 1, $n, $k - 1);
            array_shift($this->path);
        }
    }

    public function testPermute () {
        dump($this->permute([1, 2, 3]));

    }

    public $ret = [];
    public $path = [];

    function permute ($nums) {
        $used = [];
        $this->permuteDFS(0, $nums, $used);
        return $this->ret;
    }

    function permuteDFS ($k = 0, $nums, $used) {
        //        dump(__LINE__."--dfs "."k=".$k." path=".json_encode($this->path));
        if (count($nums) == $k) {
            array_push($this->ret, $this->path);
            return;
        }
        //$tempNums = $nums;
        for ($i = 0; $i < count($nums); $i++) {
            if (!isset($used[$nums[$i]])) {
                array_unshift($this->path, $nums[$i]);
                $used[$nums[$i]] = 1;
                $this->permuteDFS($k + 1, $nums, $used);
                array_shift($this->path);
                unset($used[$nums[$i]]);
            }
        }
    }


    //784. 字母大小写全排列
    //给定一个字符串S，通过将字符串S中的每个字母转变大小写，我们可以获得一个新的字符串。返回所有可能得到的字符串集合。
    public function testletterCasePermutation () {
        dump($this->letterCasePermutation("a1b2"));
    }

    public $curretArr = [];

    /**
     * @param String $s
     * @return String[]
     */
    function letterCasePermutation ($s) {
        $this->curretArr = [$s];
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] >= 'a' && $s[$i] <= 'z' || $s[$i] >= 'A' && $s[$i] <= 'Z') {
                $this->doubleArr($s[$i], $i);
            } else {
                $this->updateArr($s[$i], $i);
            }
        }
        return $this->curretArr;
    }

    //数组分裂
    function doubleArr ($letter, $index) {
        $length = count($this->curretArr);
        for ($i = 0; $i < $length; $i++) {
            $this->curretArr[$i + $length] = $this->curretArr[$i];
        }
        for ($i = 0; $i < floor(count($this->curretArr) / 2); $i++) {
            //            dump(__LINE__."-- ".$i."--".(floor(count($this->curretArr) / 2) + $i)."--".$index);
            $this->curretArr[$i][$index] = strtolower($letter);
            $this->curretArr[floor(count($this->curretArr) / 2) + $i][$index] = strtoupper($letter);
        }
        //dump($this->curretArr);
    }

    function updateArr ($number, $index) {
        for ($i = 0; $i < count($this->curretArr) - 1; $i++) {
            $this->curretArr[$i][$index] = $number;
        }
    }





}
