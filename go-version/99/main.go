package main

import (
	"fmt"
	"sort"
)

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

func main() {
//fmt.Println(numTrees(3))
	root := &TreeNode{
		Val:   1,
		Left: &TreeNode{
			Val:   3,
			Left:  nil,
			Right: &TreeNode{
				Val: 2,
				Left: nil,
				Right: nil,
			},
		},
		Right: nil,
	}
	recoverTree(root)
}

func recoverTree(root *TreeNode)  {
	var treeVals  []int
	var helper func(node *TreeNode)
	helper = func(node *TreeNode) {
		if node == nil {
			return
		}
		treeVals = append(treeVals, node.Val)
		helper(node.Left)
		helper(node.Right)
	}
	helper(root)
	//treevals排序升序排列
	sort.Slice(treeVals, func(i, j int) bool { return treeVals[i] < treeVals[j] })
	fmt.Println(treeVals)
	var helper2 func(node *TreeNode)
	ind := 0
	helper2 = func(node *TreeNode) {
		if node == nil {
			return
		}
		helper2(node.Left)
		node.Val = treeVals[ind]
		fmt.Println(treeVals[ind])
		ind++
		helper2(node.Right)
	}
	helper2(root)
	fmt.Println("end")
	//PrintTree(root)
	PrintTreeMid(root)
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

func PrintTreeMid(root *TreeNode)  {
	PrintTree(root.Left)
	if root == nil {
		fmt.Println(nil)
		return
	}
	fmt.Println(root.Val)
	PrintTree(root.Right)
}