package main

import "fmt"

func main() {
	fmt.Println(numSubarrayProductLessThanK([]int{10, 5, 2, 6}, 100))
}

func numSubarrayProductLessThanK(nums []int, k int) int {
	if k <= 0 {
		return 0
	}
	ans, prod, left := 0, 1, 0
	for right := 0; right < len(nums); right++ {
		prod *= nums[right]
		for ; left <= right && prod >= k; left++ {
			prod /= nums[left]
		}
		ans += right - left + 1
	}
	return ans
}
