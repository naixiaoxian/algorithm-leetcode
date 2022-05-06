package main

import "fmt"

func main() {
	counter := Constructor()
	fmt.Println(counter.Ping(1))    // requests = [1]，范围是 [-2999,1]，返回 1
	fmt.Println(counter.Ping(100))  // requests = [1, 100]，范围是 [-2900,100]，返回 2
	fmt.Println(counter.Ping(3001)) // requests = [1, 100, 3001]，范围是 [1,3001]，返回 3
	fmt.Println(counter.Ping(3002)) // requests = [1, 100, 3001, 3002]，范围是 [2,3002]，返回 3
	//
	//来源：力扣（LeetCode）
	//链接：https://leetcode-cn.com/problems/number-of-recent-calls
	//著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
}

type RecentCounter []int

func Constructor() RecentCounter {
	return RecentCounter{}
}

func (this *RecentCounter) Ping(t int) int {
	//用指针。防止拷贝
	*this = append(*this, t)
	for (*this)[0] < t-3000 {
		*this = (*this)[1:]
	}
	return len(*this)
}
