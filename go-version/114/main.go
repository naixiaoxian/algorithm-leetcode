package main

import (
	"fmt"
)

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
			Val: 5,
			Left: nil,
			Right:&TreeNode{
				Val: 6,
				Left:nil,
				Right: nil,
			},
		},
	}
	flatten(node)
}

func flatten(root *TreeNode)  {
	if root == nil {
		return
	}
	vals :=make([]int,0)
	var helper func(node *TreeNode)
	helper = func(node *TreeNode) {
		if node != nil{
			vals = append(vals,node.Val)
		}
		if node.Left != nil {
			helper(node.Left)
		}
		if node.Right != nil {
			helper(node.Right)
		}
	}
	helper(root)
	fmt.Println(vals)
	var helper2 func(node *TreeNode)
	helper2 = func(node *TreeNode) {
		if len(vals)>0{
			temp:=vals[0]
			vals=vals[1:]
			node.Left = nil
			node.Val = temp
			if node.Right == nil && len(vals)>0{
				node.Right = new(TreeNode)
			}
			helper2(node.Right)
		}
	}
		helper2(root)
	//utils.PrintTree(root)
}




