<?php

namespace Tests\Unit;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Element;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class FiveHundredTest extends TestCase {
    //leetcode刷题。从401-500题


    public function test429 () {
        //492. 构造矩形
        //作为一位web开发者， 懂得怎样去规划一个页面的尺寸是很重要的。 现给定一个具体的矩形页面面积，
        //你的任务是设计一个长度为 L 和宽度为 W 且满足以下要求的矩形的页面。要求：
        //1. 你设计的矩形页面必须等于给定的目标面积。
        //2. 宽度 W 不应大于长度 L，换言之，要求 L >= W 。
        //3. 长度 L 和宽度 W 之间的差距应当尽可能小。
        //你需要按顺序输出你设计的页面的长度 L 和宽度 W。
        //思路 根据平方根来做计算。然后做递减
        dd($this->constructRectangle(5));
    }

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


    public function test496 () {
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

    function permute2 (array $list) {
        $first = array_shift($list);
        if (is_array($list) && count($list) > 0) {
            $arrSub = $this->permute2($list);
            $arrNew = [];
            foreach ($arrSub as $arrS) {
                $count = count($arrS);
                for ($i = 0; $i <= $count; $i++) {
                    $arrTmp = array_merge(array_slice($arrS, 0, $i), [$first], array_slice($arrS, $i));
                    if (!in_array($arrTmp, $arrNew)) {
                        $arrNew[] = $arrTmp;
                        //todo 拿$arrTmp执行一个方法
                    }
                }
            }
            return $arrNew;
        } else {
            //todo 拿$first执行一个方法
            return [[$first]];
        }
    }


    function testPerMute () {
        dump(__LINE__."--".time());
        $this->permute7([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        dump(__LINE__."--".time());
        //        $this->permute([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        //        dump(__LINE__."--".time());
        //        $this->permute3([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        //        dump(__LINE__."--".time());
        //        $this->permute4([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        //        dump(__LINE__."--".time());
        //        $this->permute5([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        //        dump(__LINE__."--".time());
        //        $this->permute6([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        //        dump(__LINE__."--".time());

    }


    function permute ($nums) {
        $this->backtracking($nums, []);
        return $this->res;
    }

    function backtracking ($nums, $arr) {
        if (count($arr) == count($nums)) {
            $this->res[] = $arr;
            return;
        }

        foreach ($nums as $value) {
            if (!in_array($value, $arr)) {
                $arr[] = $value;
                $this->backtracking($nums, $arr);
                array_pop($arr);
            }
        }
    }

    function permute3 ($nums) {
        $this->trackback3($nums, []);
        return $this->res;
    }

    function trackback3 ($nums, $trace) {
        $numsLen = sizeof($nums);
        if ($numsLen == sizeof($trace)) {
            $this->res[] = $trace;
            return;
        }

        for ($i = 0; $i < $numsLen; $i++) {
            if (array_search($nums[$i], $trace) !== false) {//判断是否重复
                continue;
            }

            $trace[] = $nums[$i];//选择
            $this->trackback3($nums, $trace);
            array_pop($trace);//撤销选择
        }
    }

    function permute4 ($nums) {
        $allList = [];
        $this->backtrack4(0, count($nums), $nums, $allList);
        return $allList;
    }

    function backtrack4 ($start, $count, $nums, &$allList) {
        if ($start == $count) {
            $allList[] = $nums;
        } else {
            for ($i = $start; $i < $count; $i++) {
                $this->swap($nums, $start, $i);
                $this->backtrack4($start + 1, $count, $nums, $allList);
                $this->swap($nums, $start, $i);
            }
        }
    }


    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute5 ($nums) {
        $allList = [];
        $this->backtrack5(0, count($nums), $nums, $allList);
        return $allList;
    }

    function backtrack5 ($start, $count, $nums, &$allList) {
        if ($start == $count) {
            $allList[] = $nums;
        } else {
            for ($i = $start; $i < $count; $i++) {
                $this->swap($nums, $start, $i);
                $this->backtrack5($start + 1, $count, $nums, $allList);
                $this->swap($nums, $start, $i);
            }
        }
    }


    function permute6 ($nums) {
        return $this->recall($nums, []);
    }

    function recall ($nums, $ignoreKeys) {
        $res = [];
        $availableLen = count($nums) - count($ignoreKeys);

        foreach ($nums as $key => $val) {
            if (isset($ignoreKeys[$val])) {
                continue;
            }

            if ($availableLen === 1) {  // 跳出递归
                return [[$val]];
            }

            $ignoreKeys[$val] = true;
            $childRes = $this->recall($nums, $ignoreKeys);  // DFS
            unset($ignoreKeys[$val]);  // 回溯

            foreach ($childRes as $v) {
                $res[] = array_merge([$val], $v);
            }
        }

        return $res;
    }

    public $total = [];

    public $ret = [];
    public $path = [];

    function permute7 ($nums) {
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

    function testFunc () {
        $start_date = "1970-01-01";
        $end_date = "2017-03-21";
        $start_time = strtotime($start_date);
        $end_time = strtotime($end_date);
        $days = abs(($start_time - $end_time) / 86400) % 7;
        //        dump($days);
        $arr = ['四', '五', '六', '天', '一', '二', '三'];
        echo '2017年3月21日是星期'.$arr[$days];
    }

    function testFunc2 () {
        $score = [
            1 => '极不满意',
            2 => '不满意',
            3 => '一般',
            4 => '满意',
            5 => '极满意',
        ];

        $project = [
            '项目1' => 4,
            '项目2' => 5,
            '项目3' => 3,
            '项目4' => 2,
            '项目5' => 1,
        ];
        dump("项目 成绩");
        foreach ($project as $key => $value) {
            dump("$key ".$score[$value]);
        }
    }

    function testFunc3 () {
        $str = 'get name';
        $str = str_replace(" ", "", $str);
        $str = str_replace("g", "G", $str);
        $str = str_replace("n", "N", $str);
        dump($str);
    }

    //请使用PHP代码，打印出所有的"水仙花数"（"水仙花数"是指一个三位数，其各位数字立方和等于该数本身。例如：153是一个"水仙花数"，因为153=1的三次方＋5的三次方＋3的三次方。） 。
    function testFunc4 () {
        $this->testFlower(153);
        $this->testFlower(153);
        $this->testFlower(370);
        $this->testFlower(371);
        $this->testFlower(407);
        $this->testFlower(406);
    }

    function testFlower ($nums) {
        $num1 = $nums % 10;
        $num2 = floor(($nums % 100) / 10);
        $num3 = floor($nums / 100);
        if (($num1 * $num1 * $num1 + $num2 * $num2 * $num2 + $num3 * $num3 * $num3) == $nums) {
            echo $nums;
        }
    }

    function testDate2 () {
        $this->testDate("2018-3-23");
    }

    function testDate ($date) {
        $time = strtotime($date);
        $date = date('Y-m-t', strtotime('-1 month', $time));
        echo $date;
        echo "<br/>";
    }

    function get_last_month_last_day ($date = '') {
        $time = strtotime($date);
        $date = date('Y-m-t', strtotime('-1 month', $time));
        echo $date;
        echo "<br/>";
    }

    function testabc () {
        $array = [
            1 => [
                'name'   => '张三',
                'phone'  => '13112345678',
                'sex'    => 1,   //男
                'email'  => '123@163.com',
                'status' => 2    //审核通过
            ],
            2 => [
                'name'   => '李四',
                'phone'  => '16812345678',
                'sex'    => 2,   //女
                'email'  => '',
                'status' => 3    //审核拒绝
            ],
            3 => [
                'name'   => '王五',
                'phone'  => '',
                'sex'    => 1,   //男
                'email'  => '536@131.com',
                'status' => 1    //待审核
            ],
        ];

        $array_sex = [
            1 => '男',
            2 => '女',
        ];
        $array_status = [
            1 => '待审核',
            2 => '审核通过',
            3 => '审核拒绝',
        ];

        //在下面补写代码
        echo '<table>';
        echo '<tr>';
        echo '<th>姓名</th>';
        echo '<th>电话</th>';
        echo '<th>性别</th>';
        echo '<th>邮箱</th>';
        echo '<th>状态</th>';
        echo '</tr>';
        foreach ($array as $value) {
            echo '<tr>';
            echo '<th>'.$value['name'].'</th>';
            echo '<th > ';
            if (empty([$value['phone']])) {
                echo $value['phone'];
            } else {
                echo "无";
            }
            echo ' </th> ';
            echo '<th>'.$value['sex'].'</th> ';
            echo '<th > ';
            if (empty($value['email'])) {
                echo $value['email'];
            } else {
                echo "无";
            }
            echo ' </th> ';
            echo '<th > '.$array_status[$value['status']].' </th > ';
            echo '</tr > ';
        }
        echo '</table > ';
    }
    //某企业发放的奖金根据利润提成。利润(I)低于或等于10万元时，奖金可提10%；
    //利润高于10万元低于20万元时，低于10万元的部分提成10%，高于10万元的部分提成7%...（具体关系如图所示）
    //。请根据关系表写出奖金计算方法reward()，并利用reward()方法计算当利润(I)=708000元时，应发放奖金总数为多少？
    function testNUm () {
        $num =;

    }

    function reward ($profit) {
        $reward = 0;
        if ($profit < 100000) {
            $reward += 100000 * 0.1;
        }
        if ($profit > 100000) {
            $reward += ($profit - 100000) * 0.07;
        }
        if ($profit > 200000) {
            $reward += ($profit - 100000) * 0.07;
        }
        if ($profit > 400000) {
            $reward += ($profit - 500000) * 0.05;
        }
        if ($profit > 600000) {
            $reward += ($profit - 200000) * 0.05;
        }
        if ($profit > 100000) {
            $reward += 100000 * 0.1;
        }


    }

}
