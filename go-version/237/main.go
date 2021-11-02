package main

import "go-version/utils"

//脑筋急转弯
//请编写一个函数，用于 删除单链表中某个特定节点 。
//在设计函数时需要注意，你无法访问链表的头节点 head ，只能直接访问 要被删除的节点 。

func deleteNode(node *utils.ListNode)  {
	node.Val = node.Next.Val
	node.Next = node.Next.Next
}

