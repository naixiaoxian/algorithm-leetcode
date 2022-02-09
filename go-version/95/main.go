package main

import "fmt"

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

func main() {
	fmt.Println(generateTrees(3))
}
func generateTrees(n int) []*TreeNode {
	if n == 0 {
		return nil
	}
	return helper(1,n)
}

func helper(left, right int) []*TreeNode {
	if left > right {
		return []*TreeNode{nil}
	}
	allTrees := []*TreeNode{}
	for i := left; i <= right; i++ {
		leftTrees := helper(left, i-1)
		rightTrees := helper(i+1, right)
		for _, leftTree := range leftTrees {
			for _, rightTree := range rightTrees {
				currTree := &TreeNode{i, nil, nil}
				currTree.Left = leftTree
				currTree.Right = rightTree
				allTrees = append(allTrees, currTree)
			}
		}
	}
	return allTrees
}
