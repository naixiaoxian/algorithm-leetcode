package main

import "fmt"

func main() {
	fmt.Println(isPerfectSquare(4))
}

//二分查找判断对应值
func isPerfectSquare(num int) bool {
	left, right := 1, num
	if num == 1 {
		return true
	}
	for left <= right {
		mid := left + (right-left)/2
		if mid*mid == num {
			return true
		} else if mid*mid > num {
			right = mid - 1
		} else {
			left = mid + 1
		}
	}
	return false
}
