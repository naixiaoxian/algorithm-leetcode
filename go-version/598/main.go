package main

import "fmt"

func main() {
	arr :=[][]int{
		{2,2},
		{3,3},
	}
	fmt.Println(maxCount(3,3,arr))
}

//给定一个初始元素全部为 0，大小为 m*n 的矩阵 M 以及在 M 上的一系列更新操作。
//
//操作用二维数组表示，其中的每个操作用一个含有两个正整数 a 和 b 的数组表示，含义是将所有符合 0 <= i < a 以及 0 <= j < b 的元素 M[i][j] 的值都增加 1。
//
//在执行给定的一系列操作后，你需要返回矩阵中含有最大整数的元素个数。

func maxCount(m int, n int, ops [][]int) int {
	//执行操作
	//返回个数
	//第一跟第二的列表
	//获取ops中ops[1]跟ops[2]的最小值
	minr:=m
	minc:=n
	for r, _ := range ops {
		tr := ops[r][0]
		tc := ops[r][1]
		if minr>tr{
			minr = tr
		}
		if minc>tc{
			minc = tc
		}
	}
	return minr*minc
}
