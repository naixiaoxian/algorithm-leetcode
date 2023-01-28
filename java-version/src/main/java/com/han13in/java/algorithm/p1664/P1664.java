package com.han13in.java.algorithm.p1664;

/**
 * @author kaiduo
 * @desc
 * @date 2023/1/28
 **/
public class P1664 {

    public int waysToMakeFair(int[] nums) {
        //偶数
        int sum1 = 0;
        //奇数
        int sum2 = 0;
        for (int i = 0; i < nums.length; i++) {
            if (i % 2 == 0) {
                sum1 += nums[i];
            } else {
                sum2 += nums[i];
            }
        }
        //偶数
        int newSum1 = 0;
        //奇数
        int newSum2 = 0;
        int res = 0;
        for (int i = 0; i < nums.length; i++) {
            //减掉第一个。奇数之和为
            if (i % 2 == 0) {
                sum1 -= nums[i];
            } else {
                sum2 -= nums[i];
            }

            if (sum2 + newSum1 == sum1 + newSum2) {
                res++;
            }
            if (i % 2 == 0) {
                newSum1 += nums[i];
            } else {
                newSum2 += nums[i];
            }


            //
        }
        return res;
    }
}
