package main

import (
	"fmt"
	"strconv"
	"strings"
)

//给你两棵二叉树 root 和 subRoot 。检验 root 中是否包含和 subRoot 具有相同结构和节点值的子树。如果存在，返回 true ；否则，返回 false 。
//二叉树 tree 的一棵子树包括 tree 的某个节点和这个节点的所有后代节点。tree 也可以看做它自身的一棵子树。
type TreeNode struct {
	Val int
	Left *TreeNode
	Right *TreeNode
}
func main()  {
	
}

func isSubtree(root *TreeNode, subRoot *TreeNode) bool {
	rootStr :=""
	getTreeStr(root,&rootStr)
	subRootStr :=""
	getTreeStr(subRoot,&subRootStr)
	s:= strings.Split(subRootStr,subRootStr)
	fmt.Println(len(s))
	fmt.Println(rootStr,subRootStr)
	return strings.Contains(rootStr,subRootStr)
}
//用字符串做处理有了太多的string转换操作。用slice应该会快
func getTreeStr(root *TreeNode,treeStr *string)  {
	if root == nil{
		return
	}
	*treeStr = *treeStr +"c"+ strconv.Itoa(root.Val)
	if root.Left == nil{
		*treeStr = *treeStr + "-l"
	}else{
		getTreeStr(root.Left,treeStr)
	}
	if root.Right == nil{
		*treeStr = *treeStr + "-r"
	}else{
		getTreeStr(root.Right,treeStr)
	}
}