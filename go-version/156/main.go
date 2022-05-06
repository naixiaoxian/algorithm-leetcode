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
func upsideDownBinaryTree(root *TreeNode) *TreeNode {
	var right, father *TreeNode
	for root != nil {
		left := root.Left
		root.Left = right
		right = root.Right
		root.Right = father
		father = root
		root = left
	}
	return father
}
