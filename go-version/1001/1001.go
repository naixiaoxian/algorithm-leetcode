package main

import "fmt"

func main() {
	n := 5
	var lamps [][]int
	lamps = append(lamps, []int{0, 0})
	lamps = append(lamps, []int{0, 1})
	lamps = append(lamps, []int{0, 4})
	var queries [][]int
	queries = append(queries, []int{0, 0})
	queries = append(queries, []int{0, 1})
	queries = append(queries, []int{0, 2})
	gridIllumination(n, lamps, queries)
}

//
//func gridIllumination(n int, lamps [][]int, queries [][]int) []int {
//	grid := makeGrid(n)
//	fmt.Println(grid)
//	grid = light(lamps, grid, n)
//	ret := search(queries, grid, n)
//	return ret
//}
//
//func makeGrid(n int) map[int][]int{
//	grid := make(map[int][]int)
//	for i := 0; i < n; i++ {
//		temp := make([]int,n)
//		grid[i]=temp
//	}
//	return grid
//}
//
//
//func light(lamps [][]int, grid map[int][]int, n int) map[int][]int {
//	var helper func(row, col int, grid map[int][]int)
//	helper = func(row, col int, grid map[int][]int) {
//		if row < 0 || row >= n || col >= n || col < 0 {
//			return
//		}
//		//fmt.Println("light",grid[row][col])
//		grid[row][col]++
//	}
//	//点亮自己。+ 八个方向
//	for _, lamp := range lamps {
//		fmt.Println(lamp)
//		helper(lamp[0], lamp[1], grid)
//		fmt.Println(grid)
//		for i := 1; i < n; i++ {
//			helper(lamp[0], lamp[1]-i, grid)
//			helper(lamp[0], lamp[1]+i, grid)
//			helper(lamp[0]+i, lamp[1], grid)
//			helper(lamp[0]-i, lamp[1], grid)
//			helper(lamp[0]+i, lamp[1]+i, grid)
//			helper(lamp[0]-i, lamp[1]-i, grid)
//			helper(lamp[0]-i, lamp[1]+i, grid)
//			helper(lamp[0]+i, lamp[1]-i, grid)
//		}
//	}
//	return grid
//}
//
//func search(queries [][]int, grid map[int][]int, n int) []int {
//	//查询是否被照亮。然后关闭周围8个灯+自身
//	var helper func(row, col int, grid map[int][]int)
//	helper = func(row, col int, grid map[int][]int) {
//		if row < 0 || row >= n || col >= n || col < 0 {
//			return
//		}
//		grid[row][col]--
//	}
//	ret := make([]int, len(queries))
//	for i, query := range queries {
//		if grid[query[0]][query[1]] > 1 {
//			ret[i] = 1
//		} else {
//			ret[i] = 0
//		}
//		helper(query[0], query[1], grid)
//		helper(query[0]+1, query[1], grid)
//		helper(query[0]-1, query[1], grid)
//		helper(query[0], query[1]+1, grid)
//		helper(query[0], query[1]-1, grid)
//		helper(query[0]+1, query[1]+1, grid)
//		helper(query[0]-1, query[1]-1, grid)
//		helper(query[0]-1, query[1]+1, grid)
//		helper(query[0]+1, query[1]-1, grid)
//	}
//	return ret
//}

func gridIllumination(n int, lamps [][]int, queries [][]int) []int {
	grid := makeGrid(n)
	grid = light(lamps, grid, n)
	fmt.Println(grid)
	ret := search(queries, grid, n)
	fmt.Println(ret)
	return ret
}

func makeGrid(n int) [][]int {
	var grid [][]int
	for i := 0; i < n; i++ {
		a1 := make([]int, n)
		grid = append(grid, a1)
	}
	return grid
}

func light(lamps [][]int, grid [][]int, n int) [][]int {
	var helper func(row, col int, grid [][]int, val int)
	helper = func(row, col int, grid [][]int, val int) {
		if row < 0 || row >= n || col >= n || col < 0 || grid[row][col] == -1 {
			return
		}
		if val != 0 {
			grid[row][col] = -1
		}else{
			grid[row][col]++
		}
	}
	//点亮自己。+ 八个方向
	for _, lamp := range lamps {
		helper(lamp[0], lamp[1], grid, -1)
		for i := 1; i < n; i++ {
			helper(lamp[0]+i, lamp[1], grid, 0)
			helper(lamp[0]-i, lamp[1], grid, 0)
			helper(lamp[0], lamp[1]+i, grid, 0)
			helper(lamp[0], lamp[1]-i, grid, 0)
			helper(lamp[0]+i, lamp[1]+i, grid, 0)
			helper(lamp[0]-i, lamp[1]-i, grid, 0)
			helper(lamp[0]-i, lamp[1]+i, grid, 0)
			helper(lamp[0]+i, lamp[1]-i, grid, 0)
		}
	}
	return grid
}



func search(queries [][]int, grid [][]int, n int) []int {
	//查询是否被照亮。然后关闭周围8个灯+自身

	var helper2 func(row, col int, grid [][]int)
	helper2 = func(row, col int, grid [][]int) {
		if row < 0 || row >= n || col >= n || col < 0 || grid[row][col] <= 0 {
			return
		}
		grid[row][col] --
	}

	var helper func(row, col int, grid [][]int)
	helper = func(row, col int, grid [][]int) {
		if row < 0 || row >= n || col >= n || col < 0 || grid[row][col] != -1 || grid[row][col] == 0 {
			return
		}
		if grid[row][col] == -1 {
			//如果是主要等的话
			grid[row][col] = 0
			for i := 1; i < n; i++ {
				helper2(row+i, col, grid)
				helper2(row-i, col, grid)
				helper2(row, col+i, grid)
				helper2(row, col-i, grid)
				helper2(row+i,col+i, grid)
				helper2(row-i,col-i, grid)
				helper2(row-i,col+i, grid)
				helper2(row+i,col-i, grid)
			}
		}else{
			grid[row][col]--
		}
	}
	ret := make([]int, len(queries))
	for i, query := range queries {
		if grid[query[0]][query[1]] > 0 {
			ret[i] = 1
		} else {
			ret[i] = 0
		}
		helper(query[0], query[1], grid)
		helper(query[0]+1, query[1], grid)
		helper(query[0]-1, query[1], grid)
		helper(query[0], query[1]+1, grid)
		helper(query[0], query[1]-1, grid)
		helper(query[0]+1, query[1]+1, grid)
		helper(query[0]-1, query[1]-1, grid)
		helper(query[0]-1, query[1]+1, grid)
		helper(query[0]+1, query[1]-1, grid)
		fmt.Println("end",grid)
	}
	return ret
}
