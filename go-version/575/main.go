package main

import "fmt"

//给定一个偶数长度的数组，其中不同的数字代表着不同种类的糖果，
//每一个数字代表一个糖果。你需要把这些糖果平均分给一个弟弟和一个妹妹。返回妹妹可以获得的最大糖果的种类数。
//遍历一次数组
//根据对应的值进行排序


//贪心算法
//糖果数量为n  妹妹分到一半的糖果 不超过 n/2
//糖果一定有m种 答案不会超过m
func main()  {
	fmt.Println(distributeCandies([]int{6,6,6,6}))
}

func distributeCandies(candyType []int) int {
	candyMap := make(map[int]int,0)
	for i:= range candyType {
		candyMap[candyType[i]]++
	}
	if len(candyMap)> len(candyType)/2{
		return len(candyType)/2
	}else{
		return len(candyMap)
	}
}

