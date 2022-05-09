package main

func main() {

}

func diStringMatch(s string) (ret []int) {
	//确定字符串范围
	//依次取数字
	left, right := 0, len(s)
	bytes := []byte(s)
	for _, val := range bytes {
		if val == 'I' {
			ret = append(ret, left)
			left++
		} else {
			ret = append(ret, right)
			right--
		}
	}
	ret = append(ret, left)
	return
}
