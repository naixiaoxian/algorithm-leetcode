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

func countNodes(root *TreeNode) int {
	count := 0
	var preTra func(*TreeNode)
	preTra = func(node *TreeNode) {
		if node == nil {
			return
		}
		count++
		preTra(node.Left)
		preTra(node.Right)
	}
	preTra(root)
	return count
}

func rightSideView(root *TreeNode) []int {
	//每一层取数之后取最右边的
	//rets := make(map[int][]int)
	//var preTra func(*TreeNode, int)
	//preTra = func(node *TreeNode, dep int) {
	//	if node == nil {
	//		return
	//	}
	//	rets[dep] = append(rets[dep], node.Val)
	//	dep++
	//	preTra(node.Left, dep)
	//	preTra(node.Right, dep)
	//}
	//ret := make([]int, 0)
	//preTra(root, 0)
	//for i := 0; i < len(rets); i++ {
	//	ret = append(ret, rets[i][len(rets[i])-1])
	//}
	//return ret
}
