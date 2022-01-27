package main

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

func main() {

}

func inorderTraversal(root *TreeNode) []int {
	arr :=make([]int,0)
	var inTravelsal func(node *TreeNode)
	inTravelsal = func(node *TreeNode)  {
		if node == nil {
			return
		}
		inTravelsal(node.Left)
		arr = append(arr, node.Val)
		inTravelsal(node.Right)
	}
	inTravelsal(root)
	return arr
	//注意golang的闭包函数。跟相关的办法。
}




