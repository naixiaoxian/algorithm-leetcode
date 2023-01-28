package com.han13in.java.algorithm.p1813;

/**
 * @author kaiduo
 * @desc
 * @date 2023/1/16
 **/

public class P1813 {
    // 我的思路
    // 设定 a 长 b 短
    // 1 字符串单项包含  a包含b 或者 b包含a
    // 2 分割字符串a,b得到数组。如果
    //

    //根据题意，两个句子 1sentence和 2sentence
    //2如果是相似的，那么这两个句子按空格分割得到的字符串数组 _1words _2words
    //2一定能通过往其中一个字符串数组中插入某个字符串数组（可以为空），
    // 得到另一个字符串数组。这个验证可以通过双指针完成。
    // i 表示两个字符串数组从左开始，最多有 i 个字符串相同。j 表示剩下的字符串数组从右开始
    // ，最多有 j 个字符串相同。如果 i+j 正好是某个字符串数组的长度，那么原字符串就是相似的。
    //
    //作者：LeetCode-Solution
    //链接：https://leetcode.cn/problems/sentence-similarity-iii/solution/ju-zi-xiang-si-xing-iii-by-leetcode-solu-vjy7/
    //来源：力扣（LeetCode）
    //著作权归作者所有。商业转载请联系作者获得授权，非商业转载请注明出处。
}
