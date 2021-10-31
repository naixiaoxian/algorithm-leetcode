<?php

namespace Tests\Unit\Day9;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Element;
use SebastianBergmann\CodeCoverage\Report\Xml\Node;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class ListNode {
    public $val = 0;
    public $next = null;

    function __construct ($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class Day9Test extends TestCase {


    public function testMiddleNode () {
        $input = [1, 2, 3, 4, 5];
        $l1 = [1, 2, 4];
        $l2 = [1, 3, 4];
        dump($this->mergeTwoLists($this->makeNodes($l1), $this->makeNodes($l2)));
        dump($this->mergeTwoLists($this->makeNodes([]), $this->makeNodes([])));
        //        dd($this->reverseString($input));
    }

    public function makeNodes ($arr) {
        $i = 0;
        $node = new ListNode();
        $selectNode = $node;
        while ($i < count($arr)) {
            $selectNode->val = $arr[$i];
            if ($i + 1 < count($arr)) {
                $selectNode->next = new ListNode();
                $selectNode = $selectNode->next;
            }
            $i++;
        }
        return $node;
    }
    //21. 合并两个有序链表
    //将两个升序链表合并为一个新的 升序 链表并返回。新链表是通过拼接给定的两个链表的所有节点组成的。
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists ($l1, $l2) {
        $slow = $l1;
        $high = $l2;
        $retNode = $curretNode = null;
        while ($slow || $high) {
            $selectNode = null;
            if (!$slow) {
                $selectNode = $high;
                $high = $high->next;
            } else if (!$high) {
                $selectNode = $slow;
                $slow = $slow->next;
            } else if ($slow->val < $high->val) {
                $selectNode = $slow;
                $slow = $slow->next;
            } else if ($slow->val >= $high->val) {
                $selectNode = $high;
                $high = $high->next;
            } else {
                return $retNode;
            }
            $tempNode = new ListNode($selectNode->val);
            if (isset($retNode)) {
                $curretNode->next = $tempNode;
                $curretNode = $curretNode->next;
            } else {
                $curretNode = $tempNode;
                $retNode = $curretNode;
            }

            //            dump($retNode);
        }
        return $retNode;

    }

    //206. 反转链表
    //给你单链表的头节点 head ，请你反转链表，并返回反转后的链表。
    public function testReverList () {
        $input = [];
        dump($this->reverseList($this->makeNodes($input)));
        //        dd($this->reverseString($input));
    }


    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList ($head) {
        $arr = [];
        if (isset($head->val)) {
            while ($head) {
                array_push($arr, $head->val);
                $head = $head->next;
            }
        }
        $node = new ListNode(null, null);
        $selectNode = $node;
        for ($i = 0; $i < count($arr); $i++) {
            $selectNode->val = $arr[count($arr) - 1 - $i];
            if ($i + 1 < count($arr)) {
                $selectNode->next = new ListNode();
                $selectNode = $selectNode->next;
            }
        }
        return $node;
    }

    /**
     * @param ListNode $head
     * @return ListNode
     */
    //利用快慢指针来走链表。快指针2格慢指针一格。如果快指针为null则慢指针到链表的中间节点。
    function middleNode (ListNode $head) {
        //除2
        $slow = $head;
        $fast = $head;
        while ($fast->next) {
            $slow = $slow->next;
            $fast = $fast->next;
            if ($fast->next != null) {
                $fast = $fast->next;
            }
        }

        return $slow;
    }

    //给你一个链表，删除链表的倒数第 n 个结点，并且返回链表的头结点。
    //类似快慢节点的算法。然后在边界值的特殊情况进行特殊处理。
    public
    function testRemoveNthFromEnd () {
        $input = [1, 2];
        $node = $this->makeNodes($input);
        dd($this->removeNthFromEnd($node, 2));
        str_contains();
    }


    /**
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd (ListNode $head, int $n) {
        //双指针来找节点
        $slow = $head;
        $fast = $head;
        $count = 1;
        while ($fast->next) {
            if ($count > $n) {
                $slow = $slow->next;
            }
            $fast = $fast->next;
            $count++;
        }
        if ($n - $count == 0) {
            $slow->val = $slow->next->val;
            $slow->next = $slow->next->next;
        }
        if ($n - $count < 0 && $slow->next) {
            $slow->next = $slow->next->next;
        }
        if ($count == $n && $count == 1) {
            $head = [];
        }
        return $head;

    }

}
