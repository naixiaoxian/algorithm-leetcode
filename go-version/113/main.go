package main

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

func main() {

}

func PathSum(root *TreeNode, sum int) (ans [][]int) {
	path := []int{}
	var dfs func(*TreeNode,int)
	dfs = func(node *TreeNode, left int) {
		if node ==nil{
			return
		}
		left -=node.Val
		path = append(path,node.Val)
		defer func() {
			path = path[:len(path)-1]
		}()
		if node.Left == nil && node.Right == nil && left == 0{
			ans = append(ans,append([]int(nil),path ...))
		}
		dfs(node.Left,left)
		dfs(node.Right,left)
	}
	dfs(root,sum)
	return
}

