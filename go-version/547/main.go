package main

import "fmt"

func main() {
	fmt.Println(findCircleNum([][]int{
		{1, 0, 0, 1},
		{0, 1, 1, 0},
		{0, 1, 1, 1},
		{1, 0, 1, 1},
	}))
}

func findCircleNum(isConnected [][]int) (ans int) {
	vis := make([]bool, len(isConnected))
	var dfs func(int)
	dfs = func(from int) {
		fmt.Println("go func",from)
		vis[from] = true
		//1 对每一行进行单独计算
		//2 对应的行数其实也是对应的列数。因此只需要计算每次行数即可 **
		for to, conn := range isConnected[from] {
			if conn == 1 && !vis[to] {
				dfs(to)
			}
		}
	}
	fmt.Println("go range ")
	fmt.Println(vis)
	for i, v := range vis {
		if !v {
			ans++
			dfs(i)
		}
	}
	return

}

//
//func DFS(isConnect [][]int, c int, r int) {
//
//	if c < 0 || c >= len(isConnect) || r < 0 || r >= len(isConnect[0]) || isConnect[c][r] == 0 {
//		return
//	}
//
//	isConnect[c][r] = 0
//	isConnect[r][c] = 0
//	//找关联关系。
//	if r < len(isConnect[0]){
//		DFS(isConnect,c,r+1)
//		DFS(isConnect,c-1,r)
//		DFS(isConnect,c,r-1)
//		DFS(isConnect,c+1,r)
//	}
//
//
//}
