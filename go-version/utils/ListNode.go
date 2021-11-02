package utils

import "fmt"

type ListNode struct {
	Val  int
	Next *ListNode
}

// NewListNode 针对第一个无法确定的情况。增加一个亚节点 0-> 然后使用完毕之后再将其去除
func NewListNode(inputArr []int) *ListNode{
	head := &ListNode{
		Val: inputArr[0],
	}
	tail := head
	for i := 1; i < len(inputArr); i++ {
		tail.Next = &ListNode{
			Val: inputArr[i],
		}
		tail = tail.Next
	}
	head.Show()
	return head
}

func (h *ListNode)Append(i int)  {
	for h.Next != nil {
		h = h.Next
	}
	h.Next = &ListNode{Val:i}
}

func (h *ListNode) Show() {
	fmt.Println(h.Val)
	for h.Next != nil {
		h = h.Next
		fmt.Println(h.Val)
	}
}