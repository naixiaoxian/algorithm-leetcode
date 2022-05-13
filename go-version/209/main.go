package main

import "fmt"

func main() {
	fmt.Println(minSubArrayLen(7, []int{2, 3, 1, 2, 4, 3}))
}

func minSubArrayLen(target int, nums []int) (ret int) {
	left, right, sum := 0, 0, 0
	ret = len(nums)
	//注意越界
	for right < len(nums) {
		sum += nums[right]
		for sum >= target {
			ret = Min(ret, right-left+1)
			sum -= nums[left]
			left++
		}
		right++
	}

	return
}

//
//func minSubArrayLen(s int, nums []int) int {
//	left := 0
//	right := 0
//	total := 0
//	min := 0
//	for  right < len(nums) {
//		total += nums[right]
//		for total>=s {
//			if min == 0 {
//				min = right-left+1
//			}else{
//				min = Min(min, right-left+1)
//			}
//			total = total - nums[left]
//			left++
//		}
//		right++
//	}
//	return min
//}
//

func Min(val1 int, val2 int) int {
	if val1 < val2 {
		return val1
	} else {
		return val2
	}
}
