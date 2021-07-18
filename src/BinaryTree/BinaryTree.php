<?php declare(strict_types=1);

namespace App\BinaryTree;

class BinaryTree
{
    private ?BstNode $root = null;

    public function addValue(int $value): void
    {
        $node = new BstNode($value);
        if (null === $this->root) {
            $this->root = $node;
        }
        $this->root->addNode($node);
    }

    public function reverse(): void
    {
        $this->root->reverse();
    }

    public function traverse(): array
    {
        $result = [];
        return $this->root->visit($result);
    }

    public function search(int $value): ?BstNode
    {
        return $this->root->find($value);
    }
}
