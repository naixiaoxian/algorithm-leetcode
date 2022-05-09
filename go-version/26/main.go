package main

func main() {

}

func removeDuplicates(nums []int) int {
	start, end := 1, 1
	for start < len(nums) {
		if nums[start] != nums[start-1] {
			nums[end] = nums[start]
			end++
		}
		start++
	}
	return end
}
