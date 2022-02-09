package main

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

func main() {
	node := &TreeNode{
		Val: 1,
		Left: &TreeNode{
			Val: 2,
			Left: &TreeNode{
				Val:   4,
				Left:  nil,
				Right: nil,
			},
			Right: nil,
		},
		Right: &TreeNode{
			Val:  3,
			Left: nil,
			Right: &TreeNode{
				Val:   5,
				Left:  nil,
				Right: nil,
			},
		},
	}
	levelOrder(node)
}

func levelOrder(root *TreeNode) [][]int {
	ret := make(map[int][]int, 0)
	var levelDep func(root *TreeNode, dep int)
	levelDep = func(root *TreeNode, dep int) {
		if root == nil {
			return
		}
		ret[dep] = append(ret[dep], root.Val)
		//fmt.Println(dep%2, ret[dep], dep, "end")
		levelDep(root.Left, dep+1)
		levelDep(root.Right, dep+1)
	}
	levelDep(root, 0)
	var res [][]int
	//注意在这个地方要for+下标来做。
	for i := 0; i < len(ret); i++ {
		if i%2 == 0 {
			res = append(res, ret[i])
		} else {
			var kres []int
			for k := len(ret[i])-1; k >= 0; k-- {
				kres = append(kres, ret[i][k])
			}
			res = append(res,kres)
		}

	}
	//fmt.Println(ret)
	//fmt.Println(res)
	return res
}
