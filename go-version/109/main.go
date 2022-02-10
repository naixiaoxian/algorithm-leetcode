package main

type TreeNode struct {
	Val   int
	Left  *TreeNode
	Right *TreeNode
}

type ListNode struct {
	Val  int
	Next *ListNode
}

func main() {

}

func sortedListToBST(head *ListNode) *TreeNode {
	var nodeToArr func(node *ListNode)
	var arr []int
	nodeToArr = func(node *ListNode) {
		if node!=nil {
			arr = append(arr,node.Val)
			nodeToArr(node.Next)
		}
	}
	nodeToArr(head)
	return sortedArrayToBST(arr)
}

//bugenju
func sortedArrayToBST(nums []int) *TreeNode {
	var buildTree func(inums []int, left, right int) *TreeNode
	buildTree = func(inums []int, left, right int) *TreeNode {
		if left > right {
			return nil
		}
		mid := (left + right) / 2
		root := &TreeNode{Val: inums[mid]}
		root.Left = buildTree(inums, left, mid-1)
		root.Right = buildTree(inums, mid+1, right)
		return root
	}
	return buildTree(nums, 0, len(nums)-1)
}
