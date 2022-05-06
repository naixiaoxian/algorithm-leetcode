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
	fmt.Println(sumNumbers(node))
}

func sumNumbers(root *TreeNode) int {
	var getTotalSum func(node *TreeNode, preSum int) int
	getTotalSum = func(node *TreeNode, preSum int) int {
		if node == nil {
			return 0
		}
		sum := preSum*10 + node.Val
		if node.Left == nil && node.Right == nil {
			return sum
		}
		return getTotalSum(node.Left, sum) + getTotalSum(node.Right, sum)
	}
	return getTotalSum(root, 0)
	//return dfs(root, 0)
}

func dfs(root *TreeNode, prevSum int) int {
	if root == nil {
		return 0
	}
	sum := prevSum*10 + root.Val
	if root.Left == nil && root.Right == nil {
		return sum
	}
	return dfs(root.Left, sum) + dfs(root.Right, sum)
}
