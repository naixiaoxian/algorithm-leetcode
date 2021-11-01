package main

import "fmt"

func main() {
fmt.Println(minSubArrayLen(4,[]int{1,3,0}))
}

func minSubArrayLen(s int, nums []int) int {
	left := 0
	right := 0
	total := 0
	min := 0
	for  right < len(nums) {
		total += nums[right]
		for total>=s {
			if min == 0 {
				min = right-left+1
			}else{
				min = Min(min, right-left+1)
			}
			total = total - nums[left]
			left++
		}
		right++
	}
	return min
}

func Min(val1 int, val2 int) int {
	if val1 < val2 {
		return val1
	} else {
		return val2
	}
}
