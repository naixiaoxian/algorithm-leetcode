package main

func main() {

}

func sortedSquares(nums []int) []int {
	slow, fast := 0, len(nums)-1
	rets := make([]int, len(nums))
	i := len(nums) - 1
	for i >= 0 {
		if nums[slow]+nums[fast] > 0 {
			//不需要替换。右边最大
			rets[i] = nums[fast] * nums[fast]
			fast--
		} else {
			rets[i] = nums[slow] * nums[slow]
			slow++
		}
		i--
	}
	return rets
}
