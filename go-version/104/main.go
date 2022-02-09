package main

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

func main() {

}

func maxDepth(root *TreeNode) int {
	max :=0
	var getMaxLenth func(root *TreeNode,dep int)
	getMaxLenth = func(root *TreeNode, dep int) {
		if root == nil{
			return
		}
		dep++
		if max < dep {
			max = dep
		}
		getMaxLenth(root.Left,dep)
		getMaxLenth(root.Right,dep)
	}
	getMaxLenth(root,0)
	return max
}
