package utils

import "fmt"

type Node struct {
	Val int
	Left *Node
	Right *Node
	Next *Node
}

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

func PrintTree(root *TreeNode)  {
	if root == nil {
		fmt.Println(nil)
		return
	}
	fmt.Println(root.Val)
	PrintTree(root.Left)
	PrintTree(root.Right)
}