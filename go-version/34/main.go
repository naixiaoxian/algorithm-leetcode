package main

import "fmt"

func main() {
	searchRange([]int{1}, 1)
}

func searchRange(nums []int, target int) []int {
	selectPos := -1
	if len(nums) <= 0 || target < nums[0] || target > nums[len(nums)-1] {
		return []int{-1, -1}
	}
	left, rignt := 0, len(nums)-1
	for left <= rignt {
		mid := left + (rignt-left)>>1
		if nums[mid] == target {
			selectPos = mid
			break
		} else if nums[mid] > target {
			rignt = mid - 1
		} else {
			left = mid + 1
		}
	}
	fmt.Println(selectPos)
	if selectPos == -1 {
		return []int{-1, -1}
	}
	start, end := selectPos, selectPos
	for start-1 >= 0 && nums[start-1] == target {
		start--
	}
	for end+1 <= len(nums)-1 && nums[end+1] == target {
		end++
	}
	return []int{start, end}
}
