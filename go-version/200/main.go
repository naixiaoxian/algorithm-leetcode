package main

import (
	"fmt"
)

func main() {
	grid := [][]byte{
		{'1', '0', '0', '1', '0'},
		{'1', '1', '0', '1', '0'},
		{'0', '0', '0', '0', '0'},
		{'0', '0', '0', '0', '0'}}
	fmt.Println(numIslands(grid))
}


// DFS 使用后需要将初始值变为空
func DFS(grid [][]byte,r int, c int, ) {
	nr := len(grid)
	nc := len(grid[0])
	if r < 0 || r >= nr || c < 0 || c >= nc || grid[r][c] == '0' {
		return
	}
	grid[r][c] = '0'
	DFS(grid,r-1,c)
	DFS(grid,r+1,c)
	DFS(grid,r,c-1)
	DFS(grid,r,c+1)
}

func numIslands(grid [][]byte) int {
	landCount := 0
	for i := 0; i < len(grid); i++ {
		for j := 0; j < len(grid[0]); j++ {
			if grid[i][j] == '1' {
				landCount = landCount + 1
				DFS(grid,i,j)
				fmt.Println("==>i=",i,"==>j=",j,"==>map",grid)
			}
		}
	}
	return landCount
}
