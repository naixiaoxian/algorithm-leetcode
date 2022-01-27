package main

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

func main() {

}

func isSameTree(p *TreeNode, q *TreeNode) bool {
	if p == nil && q== nil {
		return true
	}else if p==nil || q==nil{
		return false
	}else if p.Val !=q.Val{
		return false
	}else{
		return isSameTree(p.Left,q.Left) && isSameTree(p.Right,q.Right)
	}
	left := false
	right := false
	if p == nil && q== nil{
		return true
	}else if p == nil || q== nil {
		return false
	} else if p.Val == q.Val {
		left = isSameTree(p.Left,q.Left)
		right =isSameTree(p.Right,q.Right)
	}
	if left == right && right == true{
		return true
	}else{
		return false
	}
}



