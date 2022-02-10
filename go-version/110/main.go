package main

import "fmt"

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
	fmt.Println(isBalanced(node))
}

//
//func isBalanced(root *TreeNode) bool {
//	if root == nil {
//		return true
//	}
//	//fmt.Println(getTreeDep(root.Left))
//	//fmt.Println(getTreeDep(root.Right))
//	clamp := getTreeDep(root.Left) - getTreeDep(root.Right)
//	if -1 <= clamp && clamp <= 1 {
//		return true
//	}else {
//		return false
//	}
//}
//
//func getTreeDep(root *TreeNode) int {
//	dep := make(map[int]int)
//	var depTree func(root *TreeNode, depi int)
//	depTree = func(root *TreeNode, depth int) {
//		if root != nil {
//			dep[depth] = 1
//		}else{
//			return
//		}
//		depth++
//		if root.Left!=nil{
//			depTree(root.Left, depth)
//		}
//		if root.Right !=nil{
//			depTree(root.Right, depth)
//		}
//	}
//	depTree(root, 0)
//	return len(dep)
//}

func isBalanced(root *TreeNode) bool {
	return height(root) >= 0
}

func height(root *TreeNode) int {
	if root == nil {
		return 0
	}
	leftHeight := height(root.Left)
	rightHeight := height(root.Right)
	if leftHeight == -1 || rightHeight == -1 || abs(leftHeight-rightHeight) > 1 {
		return -1
	}
	//深度+1
	return max(leftHeight, rightHeight) + 1
}

func max(x, y int) int {
	if x > y {
		return x
	}
	return y
}

func abs(x int) int {
	if x < 0 {
		return -1 * x
	}
	return x
}
