package main

import "fmt"

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

func main() {
	node := &TreeNode{
		Val: 1,
		Left: &TreeNode{
			Val: 2,
			Left: &TreeNode{
				Val: 3,
				Left:nil,
				Right: nil,
			},
			Right:&TreeNode{
				Val: 4,
				Left:nil,
				Right: nil,
			},
		},
		Right:&TreeNode{
			Val: 2,
			Left: &TreeNode{
				Val: 4,
				Left:nil,
				Right: nil,
			},
			Right:&TreeNode{
				Val: 3,
				Left:nil,
				Right: nil,
			},
		},
	}
	isSymmetric(node)
}

func isSymmetric(root *TreeNode) bool {
	return isNodeSymmetric(root.Left,root.Right)
}


func isNodeSymmetric(left *TreeNode, right *TreeNode) bool {
	if left == nil && right == nil {
		fmt.Println(1)
		return true
	}
	if left == nil || right == nil {
		return false
	}
	if left.Val != right.Val {
		fmt.Println(3)
		return false
	}
	fmt.Sprintf("left %d,right %d",left.Val,right.Val);
	return isNodeSymmetric(left.Left,right.Right) && isNodeSymmetric(left.Right,right.Left)
}
