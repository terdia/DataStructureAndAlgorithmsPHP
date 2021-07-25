<?php declare(strict_types=1);

namespace App\LinkedList;

class ListNode
{
    private int       $value;
    private ?ListNode $next = null;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function addNext(ListNode $node): void
    {
        if (null !== $this->next) {
            $this->next->addNext($node);
        } else {
            $this->next = $node;
        }
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getNext(): ?ListNode
    {
        return $this->next;
    }

    public function setNext(?ListNode $next): void
    {
        $this->next = $next;
    }

    public function visit(array &$result): array
    {
        if (null === $this) {
            return [];
        }

        $result[] = $this->getValue();
        if (null !== $this->next) {
            $this->next->visit($result);
        }

        return $result;
    }

    public function reverseList(): ?ListNode
    {
        $prev = null;
        $curr = $this;
        while (null !== $curr) {
            $nextTemp = $curr->getNext();
            $curr->setNext($prev);
            $prev = $curr;
            $curr = $nextTemp;
        }

        return $prev;
    }

    public function findNode(int $value): ?ListNode
    {
        if (null === $this) {
            return null;
        }

        if ($this->value === $value) {
            return $this;
        }

        if (null !== $this->next) {
            return $this->next->findNode($value);
        }

        return null;
    }

}
