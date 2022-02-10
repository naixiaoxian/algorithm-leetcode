package main

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}


func main()  {
	
}

func buildTree(inorder []int,postorder []int) *TreeNode {
	idxMap := map[int]int{}
	for i, v := range inorder {
		idxMap[v] = i
	}
	var build func(int,int)*TreeNode
	build = func(inorderLeft int, inorderRight int) *TreeNode {
		if inorderLeft>inorderRight{
			return nil
		}
		val := postorder[len(postorder)-1]//根结点
		postorder = postorder[:len(postorder)-1]
		root := &TreeNode{Val: val}
		inorderRightIndex:= idxMap[val]
		root.Right = build(inorderRightIndex+1,inorderRight)
		root.Left = build(inorderLeft,inorderRightIndex-1)
		return  root
	}
	return build(0,len(inorder)-1)
}