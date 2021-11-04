package main

import "fmt"

func main() {
	fmt.Println(isPerfectSquare(14))
}
//二分查找判断对应值
func isPerfectSquare(num int) bool {
	left := 1
	right := num
	if num == 1 {
		return true
	}
	var mid int
	for left < right {
		mid = left + (right-left)/2
		fmt.Println("===>",mid,left,right)
		if mid*mid > num {
			right = mid
		} else if mid*mid < num {
			left = mid
		} else {
			return true
		}
		if left+1>=right {
			if left*left==num || right*right ==num{
				return true
			}else{
				return false
			}
		}
	}
	return false
}
