package main

//给定 s 和 t 两个字符串，当它们分别被输入到空白的文本编辑器后，请你判断二者是否相等。# 代表退格字符。
//
//如果相等，返回 true ；否则，返回 false 。
//
//注意：如果对空文本输入退格字符，文本继续为空。

func main()  {
	backspaceCompare("#","ab#c")
}

func backspaceCompare(s string, t string) bool {
	//如果有退格，那么删掉前面那个跟退格
	ns:=getBackSp(s)
	nt :=getBackSp(t)
	//fmt.Println("==>ns",ns,"==nt",nt)
	return ns==nt
}

func getBackSp(s string) string {
	ans := make([]byte,0)
	for i := range s {
		if s[i] == '#' {
			count := len(ans)
			if count>0{
				ans = ans[:count-1]
			}
		}else{
			ans = append(ans,s[i])
		}
	}
	return string(ans)
}
