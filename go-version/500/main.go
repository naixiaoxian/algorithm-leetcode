package main

import (
	"fmt"
	"strings"
)

//给你一个字符串数组 words ，只返回可以使用在 美式键盘 同一行的字母打印出来的单词。键盘如下图所示。
//
//美式键盘 中：
//
//第一行由字符 "qwertyuiop" 组成。
//第二行由字符 "asdfghjkl" 组成。
//第三行由字符 "zxcvbnm" 组成。

func main()  {
	input := []string{"Hello","Alaska","Dad","Peace"}
	fmt.Println(findWords(input))
}

func findWords(words []string) []string {
	var keywords [3]string = [3]string{"qwertyuiop","asdfghjkl","zxcvbnm"}
	var resultArr = make([]string,0)
	for i := 0; i < len(words); i++ {
		for j := 0; j < len(keywords); j++ {
			if checkWord(strings.ToLower(words[i]),keywords[j]) {
				resultArr =	append(resultArr,words[i] )
				break
			}
		}
	}
	return resultArr
}

func checkWord(word string,keyword string) bool {
	for i := 0; i < len(word); i++ {
		fmt.Println(string(word[i]),len(word),keyword,strings.ContainsAny(keyword,string(word[i])))
		if !(strings.ContainsAny(keyword,string(word[i]))){
			return false
		}
	}
	return true
}