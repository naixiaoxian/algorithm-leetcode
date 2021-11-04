package main

import "fmt"

func main() {
	fmt.Println(subsets([]int{9,0,3,5,7}))
}
//这种想法不健全，会有中间漏掉的情况。
//因此可以参考这种说法
//这个题蛮有意思的，可以直接从后遍历，遇到一个数就把所有子集加上该数组成新的子集，遍历完毕即是所有子集
func subsets(nums []int) [][]int {
	var ret [][]int
	if nums == nil {
		return ret
	}
	ret = append(ret, []int{})
	for _, num := range nums {
		curLength := len(ret)
		var tempRange [][]int
		for j := curLength-1; j >=0 ; j-- {
			temp:= append(ret[j],num)
			tempRange=append(tempRange,temp)
		}
		for _, ints := range tempRange {
			ret = append(ret, ints)
		}
		//fmt.Println("==>i",i,"==>ret ",ret)
	}
	//for i < len(nums) {
	//	tempRange = nil
	//	for j := 0; j < len(ret); j++ {
	//		addValue:= append(ret[j],nums[i])
	//		tempRange = append(tempRange,addValue)
	//	}
	//	for _, value := range tempRange {
	//		ret = append(ret,value)
	//	}
	//	//fmt.Println("===> i =",i,"==> ret1",ret)
	//	//fmt.Println("===> i =",i,"==> range",tempRange)
	//	//for _, value := range tempRange {
	//	//	ret = append(ret, value)
	//	//}
	//	//fmt.Println("===> i =",i,"==> ret2",ret)
	//	i++
	//}
	return ret
}
