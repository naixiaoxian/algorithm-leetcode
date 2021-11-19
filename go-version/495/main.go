package main

import "fmt"

func main() {
fmt.Println(findPoisonedDuration([]int{1,3,5},2))
}

func findPoisonedDuration(timeSeries []int, duration int) int {
	count := len(timeSeries)
	if count == 1 {
		return duration
	}
	retSec := 0
	for i := 0; i < count-1; i++ {
		if timeSeries[i+1]-timeSeries[i] > duration {
			retSec += duration
		} else {
			retSec += timeSeries[i+1] - timeSeries[i]
		}
	}
	retSec += duration
	return retSec
}
