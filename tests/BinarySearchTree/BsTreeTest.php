<?php declare(strict_types=1);

namespace Tests\BinarySearchTree;

use App\BinarySearchTree\BsTree;
use App\BinarySearchTree\BstNode;
use PHPUnit\Framework\TestCase;

class BsTreeTest extends TestCase
{

    public function testBinarySearchTreeIsOrdered(): void
    {
        $tree = $this->getTree();

        $orderedlist = $tree->traverse();
        self::assertSame(1, $orderedlist[0]);
        self::assertSame(2, $orderedlist[1]);
        self::assertSame(4, $orderedlist[2]);
        self::assertSame(8, $orderedlist[3]);
        self::assertSame(9, $orderedlist[4]);
        self::assertSame(13, $orderedlist[5]);
    }

    public function testItReversesTheOrderOfAGivenTree(): void
    {
        $tree = $this->getTree();

        $tree->reverse();

        $reversedList = $tree->traverse();
        self::assertSame(13, $reversedList[0]);
        self::assertSame(9, $reversedList[1]);
        self::assertSame(8, $reversedList[2]);
        self::assertSame(4, $reversedList[3]);
        self::assertSame(2, $reversedList[4]);
        self::assertSame(1, $reversedList[5]);
    }

    public function testItReturnsCorrespondingNodeWhenGivenAValuePresentInTheTree(): void
    {
        $tree   = $this->getTree();
        $result = $tree->search(8);
        self::assertInstanceOf(BstNode::class, $result);
        self::assertSame(8, $result->getValue());
    }

    public function testItReturnsNullWhenGivenAValueIsNotPresentInTheTree(): void
    {
        $tree   = $this->getTree();
        $result = $tree->search(20);
        self::assertNull($result);
    }

    private function getTree(): BsTree
    {
        $tree = new BsTree();
        $tree->addValue(13);
        $tree->addValue(8);
        $tree->addValue(2);
        $tree->addValue(4);
        $tree->addValue(1);
        $tree->addValue(9);

        return $tree;
    }
}
