package main

import "fmt"

//给你一个 n x n 的二进制矩阵 grid 中，返回矩阵中最短 畅通路径 的长度。如果不存在这样的路径，返回 -1 。
//二进制矩阵中的 畅通路径 是一条从 左上角 单元格（即，(0, 0)）到 右下角 单元格（即，(n - 1, n - 1)）的路径，该路径同时满足下述要求：
//路径途经的所有单元格都的值都是 0 。
//路径中所有相邻的单元格应当在 8 个方向之一 上连通（即，相邻两单元之间彼此不同且共享一条边或者一个角）。
//不该用dfs 而是用bfs来做


//qa 1 为什么 用深搜解决不了
//2 为什么广搜可以
//3 是不是深搜是我这边的问题导致的？

func main() {
	grid := [][]int{
		{0, 0, 0},
		{1, 1, 0},
		{1, 1, 0},
	}
	fmt.Println(shortestPathBinaryMatrix(grid))
}



func shortestPathBinaryMatrix(grid [][]int) int {
	//bfs method
	rows := len(grid)
	if grid == nil || rows == 0 || grid[0][0] == 1 || grid[rows-1][rows-1] == 1 {
		return -1
	}
	if len(grid) == 1 && grid[0][0] == 0 {
		return 1
	}
	direction := []int{-1, 0, 1}
	grid[0][0] = 1
	//途经的每一个点都记录从起点到次的长度
	que := make([]int, 0)
	que = append(que, 0)
	//用que记录当前点的坐标，判断有没有下一个节点

	var x, y, nx, ny int

	for len(que) > 0 {
		x, y = que[0]/rows, que[0]%rows
		que = que[1:]
		for _, i := range direction {
			for _, j := range direction {
				if i == j && i == 0 {
					continue
				}
				nx, ny = x+i, y+j
				if nx < rows && ny < rows && nx >= 0 && ny >= 0 && grid[nx][ny] == 0 {
					que = append(que, nx*rows+ny)
					grid[nx][ny] = grid[x][y] + 1
					if nx == rows-1 && ny == rows-1 {
						return grid[nx][ny]
					}
				}
			}
		}
	}
	return -1
}



//
//
//func shortestPathBinaryMatrix(grid [][]int) int {
//	step := 0
//	maxStep := 0
//	DFS(0, 0, grid, step, &maxStep)
//	return maxStep
//}
//
//func DFS(c int, r int, grid [][]int, step int, maxStep *int) {
//	if c == len(grid)-1 && r == len(grid[0])-1 && grid[c][r] == 0 {
//		step++
//		if *maxStep == -1 {
//			*maxStep = step
//		} else {
//			if step < *maxStep {
//				*maxStep = step
//			}
//		}
//		fmt.Println("====>max",maxStep)
//		return
//	}
//	if c < 0 || r < 0 || c >= len(grid)-1 || r >= len(grid[0])-1 || grid[c][r] == 1 {
//		fmt.Println("====>return ",step)
//		return
//	}
//	grid[c][r] = 1
//	step++
//	fmt.Println(step)
//	//8个方向dfs
//	DFS(c-1, r-1, grid, step, maxStep)
//	DFS(c-1, r, grid, step, maxStep)
//	DFS(c-1, r+1, grid, step, maxStep)
//	DFS(c, r-1, grid, step, maxStep)
//	DFS(c, r+1, grid, step, maxStep)
//	DFS(c+1, r-1, grid, step, maxStep)
//	DFS(c+1, r, grid, step, maxStep)
//	DFS(c+1, r+1, grid, step, maxStep)
//}
