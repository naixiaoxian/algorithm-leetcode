package main

func main()  {

}

func numSubarrayProductLessThanK(nums []int, k int) int {
	if k<=1 {
		return 0
	}
	prod :=1
	ans:=0
	left :=0
	for i := 0; i <len(nums) ; i++ {
		prod *=nums[i]
		for prod >=k {
			prod /=nums[left]
			left++
		}
		ans +=i-left +1
	}
return ans
}