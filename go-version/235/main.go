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

func getPath(root, target *TreeNode) []*TreeNode {
	path := make([]*TreeNode, 0)
	node := root
	for node != target {
		path = append(path, node)
		if target.Val < node.Val {
			node = node.Left
		} else {
			node = node.Right
		}
	}
	path = append(path, node)
	return path
}

func lowestCommonAncestor(root, p, q *TreeNode) *TreeNode {
	pathP := getPath(root, p)
	pathQ := getPath(root, q)
	var ret *TreeNode
	for i := 0; i < len(pathP) && i < len(pathQ) && pathP[i] == pathQ[i]; i++ {
		ret = pathP[i]
	}
	return ret
}

func countUnivalSubtrees(root *TreeNode) int {
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

