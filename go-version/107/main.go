package main

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}


func main()  {
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
			Val: 2,
			Left: &TreeNode{
				Val: 4,
				Left:nil,
				Right: nil,
			},
			Right:&TreeNode{
				Val: 3,
				Left:nil,
				Right: nil,
			},
		},
	}
	levelOrderBottom(node)
}

func levelOrderBottom(root *TreeNode) [][]int {
	retMap := make(map[int][]int)
	var helper func(node *TreeNode,dep int)
	helper = func(node *TreeNode, dep int) {
		if node==nil {
			return
		}
		retMap[dep] = append(retMap[dep],node.Val)
		dep++
		helper(node.Left,dep)
		helper(node.Right,dep)
	}
	helper(root,0)
	var ret [][]int
	for i := len(retMap)-1; i >= 0; i-- {
		ret = append(ret, retMap[i])
	}
	return ret
}