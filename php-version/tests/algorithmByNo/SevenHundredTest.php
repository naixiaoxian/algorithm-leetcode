<?php

namespace Tests\Unit;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Element;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class SevenHundredTest extends TestCase {
    //leetcode刷题。从601-700题


    public function test638 () {
        //638. 大礼包
        //在 LeetCode 商店中， 有 n 件在售的物品。每件物品都有对应的价格。然而，也有一些大礼包，每个大礼包以优惠的价格捆绑销售一组物品。
        //给你一个整数数组 price 表示物品价格，其中 price[i] 是第 i 件物品的价格。另有一个整数数组 needs 表示购物清单，其中 needs[i] 是需要购买第 i 件物品的数量。
        //还有一个数组 special 表示大礼包，special[i] 的长度为 n + 1 ，其中 special[i][j] 表示第 i 个大礼包中内含第 j 件物品的数量，且 special[i][n] （也就是数组中的最后一个整数）为第 i 个大礼包的价格。
        //返回 确切 满足购物清单所需花费的最低价格，你可以充分利用大礼包的优惠活动。你不能购买超出购物清单指定数量的物品，即使那样会降低整体价格。任意大礼包可无限次购买。

        dd($this->majorityElement([3, 2, 3]));
    }

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function majorityElement (array $nums): array {
        $arrCountMap = [];
        $retArr = [];
        $len = floor(count($nums) / 3);
        for ($i = 0; $i < count($nums); $i++) {
            if (!isset($arrCountMap[$nums[$i]])) {
                $arrCountMap[$nums[$i]] = 1;
            } else {
                $arrCountMap[$nums[$i]]++;
            }
            if ($arrCountMap[$nums[$i]] > $len && !in_array($nums[$i], $retArr)) {
                $retArr[] = $nums[$i];
            }
        }
        return $retArr;
    }


}
