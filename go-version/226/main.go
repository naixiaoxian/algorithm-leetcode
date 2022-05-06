package main

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

func invertTree(root *TreeNode) *TreeNode {
	var helper func(node *TreeNode) *TreeNode
	helper = func(node *TreeNode) *TreeNode {
		temp := node.Right
		node.Right = node.Left
		node.Left = temp
		if node.Left != nil {
			helper(node.Left)
		}
		if node.Right != nil {
			helper(node.Right)
		}
		return node
	}
	if root == nil {
		return nil
	}
	return helper(root)
}
