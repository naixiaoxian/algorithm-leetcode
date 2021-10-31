package main

import (
	"fmt"
	"go-version/utils"
)

//存在一个按升序排列的链表，给你这个链表的头节点 head ，请你删除链表中所有
//存在数字重复情况的节点，只保留原始链表中没有重复出现的数字。
//返回同样按升序排列的结果链表。
//
func main() {
	var arr []int = []int{0,0, 1, 2, 3,3}
	node := utils.NewListNode(arr)
	retNode := deleteDuplicates(node)
	fmt.Println(" ====>end")
	retNode.Show()

}

func deleteDuplicates(head *utils.ListNode) *utils.ListNode {
	if head == nil {
		return nil
	}

	dummy := &utils.ListNode{Val: 0, Next:head}

	cur := dummy
	for cur.Next!=nil && cur.Next.Next!=nil {
		if cur.Next.Val == cur.Next.Next.Val{
			x:=cur.Next.Val
			for cur.Next !=nil && cur.Next.Val ==x {
				cur.Next =cur.Next.Next
			}
		}else {
			cur = cur.Next
		}
	}
	
	return dummy.Next
}
