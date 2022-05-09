package main

func main() {

}

func moveZeroes(nums []int) {
	slow, fast := 0, 1
	for fast < len(nums) {
		if nums[slow] == 0 {
			nums[slow] = nums[fast]
			nums[fast] = 0
		}
		if nums[slow] != 0 {
			slow++
		}
		fast++
	}
}
