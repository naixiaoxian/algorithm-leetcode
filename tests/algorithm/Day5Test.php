<?php

namespace Tests\Unit;

use phpDocumentor\Reflection\DocBlock\Tags\Param;
use phpDocumentor\Reflection\Element;
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

class Day5Test extends TestCase {

    //给定一个头结点为 head 的非空单链表，返回链表的中间结点。
    //如果有两个中间结点，则返回第二个中间结点。

    public function testMiddleNode () {
        $input = [1, 2, 3, 4, 5];
        dd($this->makeNodes($input));
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

    public function testRemoveNthFromEnd () {
        $input = [1, 2];
        $node = $this->makeNodes($input);
        dd($this->removeNthFromEnd($node, 2));
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
