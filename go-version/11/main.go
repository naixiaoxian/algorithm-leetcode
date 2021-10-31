package main

//给你 n 个非负整数 a1，a2，...，an，每个数代表坐标中的一个点(i,ai) 。
//在坐标内画 n 条垂直线，垂直线 i的两个端点分别为(i,ai) 和 (i, 0) 。找出其中的两条线，使得它们与x轴共同构成的容器可以容纳最多的水。
//

func main() {

}

//for循环超时。
//用双指针的办法去做移动的是较小的值。这样的话肯定能找到一次循环
func maxArea(height []int) int {
	//左指针  右指针
	left := 0
	right := len(height) - 1
	max := 0
	for left < right {
		tempMax := (right - left) * If(height[right] > height[left], height[left], height[right])
		if tempMax > max {
			max = tempMax
		}
		if height[left] < height[right] {
			left++
		} else {
			right--
		}
	}
	return max
}

func If(isTrue bool, a, b int) int {
	if isTrue {
		return a
	}
	return b
}

//
