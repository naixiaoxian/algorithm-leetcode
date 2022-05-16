package main

func main() {
}

type ListNode struct {
	Val  int
	Next *ListNode
}

func swapPairs(head *ListNode) *ListNode {
	dummy := &ListNode{
		Val:  0,
		Next: head,
	}
	pre := dummy
	for head != nil && head.Next != nil {
		pre.Next = head.Next
		//虚拟节点的下个节点 变成 第二个节点
		next := head.Next.Next
		//获取第三个节点
		head.Next.Next = head
		//第二个节点的下个节点指向第一个节点
		head.Next = next
		//第一个节点的下个节点变成第三个节点
		pre = head
		//pre节点变成当前的head 节点
		head = next
		//head 节点变成第三个节点
	}
	return dummy.Next
}
