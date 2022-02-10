package main

import (
	"sort"
)

func main()  {
	countKDifference([]int{3,2,1,4},2)
}

func countKDifference(nums []int, k int) int {
	sort.Slice(nums, func(i, j int) bool {
		return nums[i] < nums[j]
	})
	count := 0
	for i := 0; i < len(nums); i++ {
		for j := i+1; j < len(nums); j++ {
			if nums[j]-nums[i] == k {
				count++
			}else if nums[j]-nums[i]>k{
				break
			}
		}
	}
	//fmt.Println(count)
	return count
}