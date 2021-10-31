package main

import (
	"fmt"
)

func main()  {
	//fmt.Println(isEqual("bab","abc"))
	pMap := findAnagrams("abab",
		"ab")
	fmt.Println(pMap)
}
//
//func findAnagrams(s string,p string)[]int{
//	res := make([]int,0)
//	left :=0
//	right:=0
//	length :=len(s)
//	aim :=make(map[byte]int)
//	now:=make(map[byte]int)
//	nownum := 0
//
//	for i, _ := range p {
//		aim[p[i]] ++
//	}
//
//	//种类长度
//	aimnum :=len(aim)
//
//	for right <=length-1{
//		for nownum != aimnum && right<=length-1 {
//			if aim[s[right]] != 0 && aim[s[right]]>now[s[right]]{
//				now[s[right]] += 1
//				if
//			}
//		}
//	}
//}


func findAnagrams(s string, p string) []int {
	var ret []int
	if len(p)>len(s) {
		return ret
	}

	existPMap:=make(map[uint8]int,0)
	//统计出现的字符与数量
	for i := 0; i < len(p); i++ {
		existPMap[p[i]] ++
		existPMap[s[i]] --
	}
	//滑动窗口总体计算即可，没必要拿进去再做计算
	for i := 0; i <len(s)-len(p)+1 ; i++ {
		if i>0{
			existPMap[s[i-1]] ++
			existPMap[s[i+len(p)-1]] --
		}
		flag := 0
		for _, value := range existPMap {
			if value != 0{
				flag =1
				break
			}
		}
		if flag == 0{
			ret = append(ret, i)
		}

	}
	return ret
}
//
//func isEqual(enter string,pStrMap map[uint8]int) bool{
//	existEnterMap :=make(map[uint8]int,0)
//	//统计出现的字符与数量
//	for i := 0; i < len(enter); i++ {
//		if existEnterMap[enter[i]] ==0 {
//			existEnterMap[enter[i]]=1
//		}else{
//			existEnterMap[enter[i]] ++
//		}
//	}
//	for key := range existEnterMap {
//		if pStrMap[key] != existEnterMap[key]{
//			return false
//		}
//	}
//	return true
//}
