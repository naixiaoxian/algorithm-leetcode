package main

import "fmt"

func main() {
	matrixa := make([]([]int), 3)
	matrixa[0] = []int{1, 2, 3, 4}
	matrixa[1] = []int{5, 6, 7, 8}
	matrixa[2] = []int{9, 10, 11, 12}
	fmt.Println(spiralOrder(matrixa))
}

func spiralOrder(matrix [][]int) []int {
	m := len(matrix)
	n := len(matrix[0])
	rets := make([]int, m*n)
	top, bottom := 0, m-1
	left, right := 0, n-1
	target := m * n
	idx := 0
	for idx < target {
		for i := left; i <= right; i++ {
			rets[idx] = matrix[top][i]
			if idx >= target {
				return rets
			}
			if idx >= target {
				return rets
			}
			idx++
		}
		top++
		for i := top; i <= bottom; i++ {
			if idx >= target {
				return rets
			}
			rets[idx] = matrix[i][right]
			idx++
		}
		right--
		for i := right; i >= left; i-- {
			if idx >= target {
				return rets
			}
			rets[idx] = matrix[bottom][i]
			idx++
		}
		bottom--
		for i := bottom; i >= top; i-- {
			if idx >= target {
				return rets
			}
			rets[idx] = matrix[i][left]
			idx++
		}
		left++
	}
	return rets
}
