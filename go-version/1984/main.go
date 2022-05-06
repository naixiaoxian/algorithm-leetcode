package main

import (
	"fmt"
	"math"
	"sort"
)

func main() {

	fmt.Println(minimumDifference([]int{9, 4, 1, 7}, 2))

}

func minimumDifference(nums []int, k int) int {
	if k <= 1 {
		return 0
	}
	sort.Slice(nums, func(i, j int) bool {
		return nums[i] < nums[j]
	})
	//fmt.Println(nums)
	minVal := math.MaxInt32
	for i := 0; i < len(nums)-(k-1); i++ {
		//
		minVal = min(nums[i+(k-1)]-nums[i], minVal)
	}
	//
	return minVal
}

func min(x, y int) int {
	if x >= y {
		return y
	}
	return x
}
