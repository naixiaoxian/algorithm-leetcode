package main

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}


func main()  {

}

//bugenju
func sortedArrayToBST(nums []int) *TreeNode {
	var buildTree func(inums []int,left,right int ) *TreeNode
	buildTree = func(inums []int,left,right int ) *TreeNode {
		if left>right{
			return nil
		}
		mid := (left+right)/2
		root := &TreeNode{Val: inums[mid]}
		root.Left = buildTree(inums,left,mid-1)
		root.Right = buildTree(inums,mid+1,right)
		return root
	}
	return buildTree(nums,0,len(nums)-1)
}