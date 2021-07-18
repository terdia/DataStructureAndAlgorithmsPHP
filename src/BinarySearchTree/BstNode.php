<?php declare(strict_types=1);

namespace App\BinarySearchTree;

class BstNode
{
    private int      $value;
    private ?BstNode $left  = null;
    private ?BstNode $right = null;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function addNode(BstNode $node): void
    {
        if ($node->getValue() < $this->value) {
            $this->addToLeft($node);
        } elseif ($node->getValue() > $this->value) {
            $this->addToRight($node);
        }
    }

    public function visit(array &$result): array
    {
        if (null !== $this->left) {
            $this->left->visit($result);
        }
        //echo $this->getValue() . "\n";
        $result[] = $this->getValue();
        if (null !== $this->right) {
            $this->right->visit($result);
        }

        return $result;
    }

    public function reverse(): void
    {
        $left        = $this->left;
        $right       = $this->right;
        $this->left  = $right;
        $this->right = $left;

        if (null !== $this->left) {
            $this->left->reverse();
        }

        if (null !== $this->right) {
            $this->right->reverse();
        }
    }

    public function find(int $value): ?BstNode
    {
        if ($this->value === $value) {
            return $this;
        }

        if ($value < $this->value && null !== $this->left) {
            return $this->left->find($value);
        }

        if ($value > $this->value && null !== $this->right) {
            return $this->right->find($value);
        }

        return null;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    private function addToLeft(BstNode $node): void
    {
        if (null === $this->left) {
            $this->left = $node;
        } else {
            $this->left->addNode($node);
        }
    }

    private function addToRight(BstNode $node): void
    {
        if (null === $this->right) {
            $this->right = $node;
        } else {
            $this->right->addNode($node);
        }
    }
}
