package main

//解法
//1把字串串变成  数组数量比较
//2初始化计算目标的字符次数
//3利用双指针。记录主字符串的次数。
import "math"

func main() {

}

func minWindow(s string, t string) string {
	ori, cnt := map[byte]int{}, map[byte]int{}
	//
	for i := 0; i < len(t); i++ {
		ori[t[i]]++
	}
	sLen := len(s)
	len := math.MaxInt32
	ansL, ansR := -1, -1

	check := func() bool {
		for k, v := range ori {
			if cnt[k] < v {
				return false
			}
		}
		return true
	}

	for l, r := 0, 0; r < sLen; r++ {
		if r < sLen && ori[s[r]] > 0 {
			cnt[s[r]]++
		}
		//满足条件之后从左开始递增
		for check() && l <= r {
			//
			if r-l+1 < len {
				len = r - l + 1
				ansL, ansR = l, l+len
			}
			if _, ok := ori[s[l]]; ok {
				cnt[s[l]] -= 1
			}
			l++
		}
	}
	if ansL == -1 {
		return ""
	}
	return s[ansL:ansR]
}
