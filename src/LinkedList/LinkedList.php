<?php declare(strict_types=1);

namespace App\LinkedList;

class LinkedList
{
    private ?ListNode $head = null;

    public function addValue(int $value): void
    {
        $listNode = new ListNode($value);
        if (null === $this->head) {
            $this->head = $listNode;
        } else {
            $this->head->addNext($listNode);
        }
    }

    public function traverse(): array
    {
        $result = [];
        if (null === $this->head) {
            return $result;
        }

        return $this->head->visit($result);
    }

    public function reverse(): void
    {
        if (null !== $this->head) {
            $this->head = $this->head->reverseList();
        }
    }

    public function search(int $value): ?ListNode
    {
        if (null !== $this->head) {
            return $this->head->findNode($value);
        }

        return null;
    }

    public function getHead(): ListNode
    {
        return $this->head;
    }

}
