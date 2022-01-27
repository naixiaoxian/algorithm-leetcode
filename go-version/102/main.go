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
	levelOrder(node)
}


func levelOrder(root *TreeNode)[][]int {
	ret := make(map[int][]int,0)
	var levelDep func(root *TreeNode,dep int)
	levelDep = func(root *TreeNode,dep int){
		if root == nil{
			return
		}
		ret[dep] = append(ret[dep],root.Val)
		levelDep(root.Left,dep+1)
		levelDep(root.Right,dep+1)
	}
	levelDep(root,0)
	var res [][]int
	//注意在这个地方要for+下标来做。
	for i := 0; i < len(ret); i++ {
		res = append(res,ret[i])
	}
	//fmt.Println(ret)
	//fmt.Println(res)
	return res
}

