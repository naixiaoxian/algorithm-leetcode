package main

type ListNode struct {
	Val  int
	Next *ListNode
}

func main() {

}

func reverseList(head *ListNode) *ListNode {
	var pre *ListNode
	curr := head
	for curr != nil {
		next := curr.Next
		//切断当前快节点的next 指针。让其指向pre
		curr.Next = pre
		//pre 移动到下一个节点
		pre = curr
		curr = next
	}
	return pre
}
