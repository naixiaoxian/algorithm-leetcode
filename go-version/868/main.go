package main

import "fmt"

func main() {
	fmt.Println(binaryGap(5))
}

func binaryGap(n int) int {
	//获取二进制
	//获取长度left, right := 0
	//arrs := make([]int, 0)
	//left := -1
	//right := -1
	//idx := 0
	//for n >= 1 {
	//	arrs = append(arrs, n%2)
	//	idx++
	//	if n%2 == 1 && left == -1 {
	//		left = idx
	//	} else if n%2 == 1 && left != -1 && right == -1 {
	//		right = idx
	//	} else if n%2 == 1 {
	//		if idx-right > right-left {
	//
	//		}
	//	}
	//	n = n >> 1
	//}
	ans := 0
	for i, last := 0, -1; n > 0; i++ {
		if n%2 == 1 {
			if last != -1 {
				if ans < i-last {
					ans = i - last
				}
			}
			last = i
		}
		n = n >> 1
	}
	return ans

}
