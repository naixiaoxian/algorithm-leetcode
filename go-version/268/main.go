package main

import (
	"fmt"
	"sort"
)

//给定一个包含 [0, n] 中 n 个数的数组 nums ，找出 [0, n] 这个范围内没有出现在数组中的那个数。
//排序然后下表不等则有问题。

func main()  {
fmt.Println(missingNumber([]int{0,1,2,3,4,6}))
}


func missingNumber(nums []int) int {
	sort.Ints(nums)
	for key, value := range nums {
		if key !=value{
			return key
		}
	}
	return len(nums)
}


