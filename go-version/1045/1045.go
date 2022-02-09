package main

import (
	"fmt"
	"sort"
)

func main() {
	fmt.Println(longestDiverseString(5, 5, 1))
}

func longestDiverseString(a int, b int, c int) string {
	ans := []byte{}
	cnt := []struct {
		c  int
		ch byte
	}{
		{a, 'a'},
		{b, 'b'},
		{c, 'c'},
	}
	for {
		sort.Slice(cnt, func(i, j int) bool { return cnt[i].c > cnt[j].c })
		//对数组进行降序排序。优先从剩下最多的开始排。
		hasNext := false
		for i, p := range cnt {
			if p.c <= 0 {
				break
			}
			m := len(ans)
			if m >= 2 && ans[m-2] == p.ch && ans[m-1] == p.ch {
				//如果前2个字母一致则跳出循环
				continue
			}
			hasNext = true
			ans = append(ans, p.ch)
			cnt[i].c--
			break
		}
		if !hasNext {
			return string(ans)
		}
	}
}
