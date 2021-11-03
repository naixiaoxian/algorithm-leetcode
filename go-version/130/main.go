package main

func main() {
}

//注意到题目解释中提到：任何边界上的 O 都不会被填充为 X。 我们可以想到，所有的不被包围的 O 都直接或间接与边界上的 O 相连。我们可以利用这个性质判断 O 是否在边界上，具体地说：
//
//对于每一个边界上的 O，我们以它为起点，标记所有与它直接或间接相连的字母 O；
//最后我们遍历这个矩阵，对于每一个字母：
//如果该字母被标记过，则该字母为没有被字母 X 包围的字母 O，我们将其还原为字母 O；
//如果该字母没有被标记过，则该字母为被字母 X 包围的字母 O，我们将其修改为字母 X。
//

var n, m int

func solve(board [][]byte){
	if len(board) == 0 || len(board[0]) == 0 {
		return
	}
	n, m = len(board), len(board[0])
	for i := 0; i < n; i++ {
		dfs(board,i,0)
		dfs(board,i,m-1)
	}
	for i := 0; i < m; i++ {
		dfs(board,0,i)
		dfs(board,n-1,i)
	}
	for i := 0; i < n; i++ {
		for j := 0; j < m; j++ {
			if board[i][j] == 'A' {
				board[i][j] = 'O'
			} else if board[i][j] == 'O' {
				board[i][j] = 'X'
			}
		}
	}
}
func dfs(board [][]byte, x, y int) {
	if x < 0 || x >= n || y < 0 || y >= m || board[x][y] != 'O' {
		return
	}
	board[x][y] = 'A'
	dfs(board, x + 1, y)
	dfs(board, x - 1, y)
	dfs(board, x, y + 1)
	dfs(board, x, y - 1)
}


//
//func solve(board [][]byte) [][]byte{
//	for i, values := range board {
//		for j, _ := range values {
//			dfs(i,j,board)
//		}
//	}
//	return board
//}
//
//func dfs(r int, c int, board [][]byte) {
//	if r < 1 || c < 1 || r > len(board)-2 || c > len((board)[0])-2 || (board)[r][c] == 'X' {
//		return
//	}
//	if (board)[r][c-1] == 'X' && (board)[r][c+1] == 'X' && (board)[r-1][c+1] == 'X' && (board)[r-1][c-1] == 'X' {
//		(board)[r][c] = 'X'
//	}
//	dfs(r-1,c-1,board)
//	dfs(r-1,c+1,board)
//	dfs(r+1,c-1,board)
//	dfs(r-1,c-1,board)
//	return
//}
