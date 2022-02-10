package main

import (
	"fmt"
	"math"
)

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

type ListNode struct {
	Val  int
	Next *ListNode
}

func main() {
	node := &TreeNode{
		Val:  1,
		Left: nil,
		Right: &TreeNode{
			Val:  2,
			Left: nil,
			Right: &TreeNode{
				Val:   3,
				Left:  nil,
				Right: nil,
			},
		},
	}
	fmt.Println(minDepth(node))
}
//
//func minDepth(root *TreeNode) int {
//	return height(root)
//}
//
//func height(root *TreeNode) int {
//	if root == nil {
//		return 0
//	}
//	minD := math.MaxInt32
//	leftHeight := height(root.Left)
//	rightHeight := height(root.Right)
//	if leftHeight == 0 {
//		return height(root.Right)
//	}else if rightHeight == 0 {
//		return height(root.Left)
//	}else{
//		return min(leftHeight, rightHeight) + 1
//	}
//
//}
//
func min(x, y int) int {
	if x > y {
		return y
	}
	return x
}

func minDepth(root *TreeNode)int{
	if root == nil{
		return 0
	}
	if root.Left==nil && root.Right ==nil{
		return 1
	}
	minD :=math.MaxInt32
	if root.Left != nil{
		minD = min(minDepth(root.Left),minD)
	}
	if root.Right != nil{
		minD = min(minDepth(root.Right),minD)
	}
	return minD+1
}