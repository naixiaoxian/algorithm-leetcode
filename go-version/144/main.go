package main

import "fmt"

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

//将tree转化为slice 。然后按照数的层级取节点。对应队列为空的时候没有对应值
func main() {
	node := &TreeNode{
		Val: 1,
		//Left:  nil,
		Left: &TreeNode{
			Val:   2,
			Left:  nil,
			Right: nil,
		},
		Right: nil,
		//Right: &TreeNode{
		//	Val:   5,
		//	Left:  nil,
		//	Right: nil,
		//},
	}
	fmt.Println(preorderTraversal(node))
}
func preorderTraversal(root *TreeNode) []int {
	ret := make([]int, 0)
	var preTra func(*TreeNode)
	preTra = func(node *TreeNode) {
		if node == nil {
			return
		}
		ret = append(ret, node.Val)
		preTra(node.Left)
		preTra(node.Right)
	}
	preTra(root)
	return ret
}
