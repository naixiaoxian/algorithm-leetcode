package main

import "fmt"

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

//将tree转化为slice 。然后按照数的层级取节点。对应队列为空的时候没有对应值
func main() {
	//node := &TreeNode{
	//	Val: 1,
	//	//Left:  nil,
	//	Left: &TreeNode{
	//		Val:   2,
	//		Left:  nil,
	//		Right: nil,
	//	},
	//	Right: nil,
	//	//Right: &TreeNode{
	//	//	Val:   5,
	//	//	Left:  nil,
	//	//	Right: nil,
	//	//},
	//}
	//fmt.Println(preorderTraversal(node))
}
func kthSmallest(root *TreeNode, k int) int {
	arrs := make([]int, 0)
	var helper func(node *TreeNode)
	helper = func(node *TreeNode) {
		if node == nil {
			return
		}
		helper(node.Left)
		arrs = append(arrs, node.Val)
		helper(node.Right)
	}
	helper(root)
	fmt.Println(arrs)
	return arrs[k-1]
}
