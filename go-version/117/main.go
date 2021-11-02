package main

type Node struct {
	Val   int
	Left  *Node
	Right *Node
	Next  *Node
}

//将tree转化为slice 。然后按照数的层级取节点。对应队列为空的时候没有对应值
func main() {

}

func connect(root *Node) *Node {
	if root ==nil{
		return nil
	}

	q:= []*Node{root}
	for len(q)>0 {
		tmp :=q
		q=nil
		for i, node := range tmp {
			if i+1 <len(tmp){
				node.Next = tmp[i+1]
			}
			if node.Left !=nil{
				q = append(q, node.Left)
			}
			if node.Right !=nil{
				q = append(q, node.Right)
			}
		}
	}
	return root
	//DFS(root, nil)
	//return root
}
//
//func DFS(root *Node, parentNode *Node) {
//	if root == nil {
//		return
//	}
//	if root.Left != nil {
//		root.Left.Next = root.Right
//		if root.Right == nil {
//			root.Left.Next = getParentRightNode(parentNode)
//		}
//	}
//	if root.Right != nil {
//		//right
//		root.Right.Next = getParentRightNode(parentNode)
//	}
//	DFS(root.Left, root)
//	DFS(root.Right, root)
//}
//
//func getParentRightNode(parentNode *Node) *Node {
//	if parentNode == nil {
//		return nil
//	}
//	if parentNode.Right == nil {
//		return nil
//	}
//	if parentNode.Right.Left != nil {
//		return parentNode.Right.Left
//	}
//	return parentNode.Right.Right
//}
