package main

func main() {

}

func mySqrt(x int) int {
	if x == 1 {
		return 1
	}
	left, right := 1, x-1
	for left <= right {
		mid := left + (right-left)>>1
		if mid*mid == x {
			return mid
		} else if mid*mid > x {
			right = mid - 1
		} else {
			left = mid + 1
		}
	}
	return left
}
