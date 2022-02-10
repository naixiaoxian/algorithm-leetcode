package main

import (
	"fmt"
	"strconv"
)

func main() {
fmt.Println(simplifiedFractions(3))
}


func simplifiedFractions(n int) ( ans []string ){
	for de := 2 ; de<=n;de++ {
		for ne := 1 ;ne<de;ne++{
			if gcd(ne,de) == 1{
				ans = append(ans,strconv.Itoa(ne)+"/"+strconv.Itoa(de))
			}
		}
	}
	return
}

func gcd(a,b int) int  {
	for a != 0 {
		a,b = b%a,a
	}
	return b
}
