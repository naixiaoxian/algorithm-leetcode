package com.han13in.java.algorithm.p1814;

import javax.servlet.http.PushBuilder;
import java.util.Arrays;
import java.util.HashMap;
import java.util.Map;

/**
 * @author kaiduo
 * @desc
 * @date 2023/1/17
 **/
public class P1814 {
    //1全部反转变成对应数字 array
    //2
    public int countNicePairs(int[] nums) {
        //
        int[] recArrs = nums.clone();
        for (int i = 0; i < nums.length; i++) {
            recArrs[i] = rec(nums[i]);
        }
        //  System.out.println(Arrays.toString(recArrs));

        int ret = 0;
        for (int i = 0; i < nums.length; i++) {
            for (int j = i + 1; j < nums.length; j++) {
                if (recArrs[j] + nums[i] == recArrs[i] + nums[j]) {
                    //            System.out.printf("%d,%d,%d,%d,%d,%d \n", i, j, recArrs[i], nums[j], recArrs[j], nums[i]);
                    ret++;
                }
            }
        }
        return ret;
    }

    public int rec(int num) {
        int recNum = 0;
        while (num > 0) {
            recNum *= 10;
            int i = num % 10;
            recNum += i;
            num = num / 10;
        }
        return recNum;
    }

    public int countNicePairs1(int[] nums) {
        final int MOD = 1000000007;
        int res = 0;
        Map<Integer, Integer> h = new HashMap<Integer, Integer>();
        for (int i : nums) {
            int temp = i, j = 0;
            while (temp > 0) {
                j = j * 10 + temp % 10;
                temp /= 10;
            }
            res = (res + h.getOrDefault(i - j, 0)) % MOD;
            h.put(i - j, h.getOrDefault(i - j, 0) + 1);
        }
        return res;
    }

}
