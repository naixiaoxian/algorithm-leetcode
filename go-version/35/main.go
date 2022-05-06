package main

func main() {

}

func searchInsert(nums []int, target int) int {
	if target < nums[0] {
		return 0
	}
	if target > nums[len(nums)-1] {
		return len(nums)
	}
	left, right := 0, len(nums)-1
	mid := 0
	for left <= right {
		mid = left + (right-left)>>1
		if nums[mid] == target {
			return mid
		} else if nums[mid] < target {
			left = mid + 1
		} else {
			right = mid - 1
		}
	}
	if nums[mid] > target {
		return mid
	} else {
		return mid + 1
	}

}
