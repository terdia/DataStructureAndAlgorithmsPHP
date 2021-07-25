<?php declare(strict_types=1);

namespace Tests\LinkedList;

use App\LinkedList\LinkedList;
use PHPUnit\Framework\TestCase;

class LinkedListTest extends TestCase
{

    public function testFirstValueInLinkedListIsTheHead(): void
    {
        $list = new LinkedList();
        $list->addValue(19);
        $list->addValue(2);

        $head = $list->getHead();

        self::assertSame(19, $head->getValue());
    }

    public function testLinkedListTreeIsOrdered(): void
    {
        $list = new LinkedList();
        $list->addValue(19);
        $list->addValue(3);
        $list->addValue(2);
        $list->addValue(17);
        $list->addValue(6);
        $expectedOrder = [19, 3, 2, 17, 6];

        $result = $list->traverse();

        self::assertSame($expectedOrder, $result);
    }

    public function testItReversesTheOrderOfAGivenLinkedList(): void
    {
        $list = new LinkedList();
        $list->addValue(19);
        $list->addValue(3);
        $list->addValue(2);
        $list->addValue(17);
        $list->addValue(6);

        $reverseOrder = [6, 17, 2, 3, 19];

        $list->reverse();
        $result = $list->traverse();

        self::assertSame($reverseOrder, $result);
    }

    public function testItReturnsCorrespondingListNodeWhenGivenAValuePresentInALinkedList(): void
    {
        $list = new LinkedList();
        $list->addValue(19);
        $list->addValue(17);
        $list->addValue(6);

        $listNode = $list->search(17);

        self::assertSame(17, $listNode->getValue());
    }

    public function testItReturnsNullWhenGivenAValueIsNotPresentInALinkedList(): void
    {
        //empty list
        $list = new LinkedList();

        $listNode = $list->search(20);

        self::assertNull($listNode);

        //add some nodes
        $list->addValue(19);
        $list->addValue(17);
        $list->addValue(6);

        $listNode = $list->search(20);

        self::assertNull($listNode);
    }
}
