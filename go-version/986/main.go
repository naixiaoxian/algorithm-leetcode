package main

//给定两个由一些 闭区间 组成的列表，firstList 和 secondList ，其中 firstList[i] = [starti, endi] 而 secondList[j] = [startj, endj] 。每个区间列表都是成对 不相交 的，并且 已经排序 。
//
//返回这 两个区间列表的交集 。
//
func main()  {
	//TODO 需要优化，提升运行效率。
}



func intervalIntersection(firstList [][]int, secondList [][]int) [][]int {
	ans :=make([][]int,0)
	iClamp :=0
	kClamp :=0
	for i := 0; i < len(firstList); i++ {
		if i<iClamp {
			i=iClamp
		}
		for k:=0;k<len(secondList);k++{
			if k<kClamp{
				k=kClamp
			}
			ret := intervalItem(firstList[i],secondList[k])
			if ret !=nil {
				ans = append(ans, ret)
				iClamp = i
				kClamp = k
			}
		}
	}
	return ans
}

func intervalItem(firstItem []int,secondItem []int) []int {
//包含
	left :=If(firstItem[0]>secondItem[0],firstItem[0],secondItem[0])
	right :=If(firstItem[1]>secondItem[1],secondItem[1],firstItem[1])
	if left>right {
		return nil
	}else{
		return []int{left,right}
	}
}

func If(isTrue bool,a,b int) int {
	if isTrue {
		return a
	}
	return b
}
