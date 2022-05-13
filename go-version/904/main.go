package main

func main() {

}

func totalFruit(fruits []int) (ret int) {
	left, right := 0, 0
	sli2 := make(map[int]int)
	for right < len(fruits) {
		sli2[fruits[right]]++
		for len(sli2) > 2 {
			sli2[fruits[left]]--
			if sli2[fruits[left]] == 0 {
				delete(sli2, fruits[left])
			}
			left++
		}
		ret = Max(ret, right-left+1)
	}
	return
}

func Max(val1 int, val2 int) int {
	if val1 > val2 {
		return val1
	} else {
		return val2
	}
}
