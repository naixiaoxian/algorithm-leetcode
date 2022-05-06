package main

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

func main() {

}

//works right
func countUnivalSubtrees(root *TreeNode) int {
	var is_uni func(*TreeNode) bool
	count := 0
	is_uni = func(node *TreeNode) bool {
		if node.Left == nil && node.Right == nil {
			count++
			return true
		}
		isUnival := true
		if node.Left != nil {
			isUnival = is_uni(node.Left) && isUnival && node.Left.Val == node.Val
		}
		if node.Right != nil {
			isUnival = is_uni(node.Right) && isUnival && node.Right.Val == node.Val
		}
		if !isUnival {
			return false
		}
		count++
		return true
	}
	if root == nil {
		return 0
	}
	is_uni(root)
	return count
}

//works right
func countUnivalSubtrees2(root *TreeNode) int {
	var isUni func(*TreeNode) (int, bool)
	count := 0
	isUni = func(node *TreeNode) (int, bool) {
		if node == nil {
			return 0, true
		}
		lVal, lb := isUni(node.Left)
		rVal, rb := isUni(node.Right)
		if lVal != 0 && lVal != node.Val {
			lb = false
		}
		if rVal != 0 && rVal != node.Val {
			rb = false
		}
		if lb && rb {
			count++
		}
		return node.Val, lb && rb
	}
	isUni(root)
	return count
}
