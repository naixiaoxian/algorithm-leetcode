package main

func main() {

}

func singleNonDuplicate(nums []int) int {
	//left := 0
	//right := len(nums)
	////if

	low, high := 0, len(nums)-1
	for low < high {
		mid := low + (high-low)/2
		if nums[mid] == nums[mid^1] {
			low = mid + 1
		} else {
			high = mid
		}
	}
	return nums[low]
}
