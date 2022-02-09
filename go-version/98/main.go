package main

import "math"

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

//func main() {
//fmt.Println(numTrees(3))
//}

func isValidBST(root *TreeNode) bool {
	//
	var helper func(node *TreeNode,low,upper int) bool
	helper = func(node *TreeNode,low,upper int) bool {
		if node == nil {
			return true
		}
		if node.Val<=low || node.Val>=upper{
			return false
		}
		return helper(node.Left,low,node.Val) && helper(node.Right,node.Val,upper)
	}
	return helper(root,math.MinInt64,math.MaxInt64)
}
