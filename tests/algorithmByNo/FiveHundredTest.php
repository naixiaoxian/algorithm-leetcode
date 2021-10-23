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


}
