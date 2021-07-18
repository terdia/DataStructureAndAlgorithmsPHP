<?php declare(strict_types=1);

namespace App\BreadthFirstSearch;

use function array_reverse;

class BfsNode
{
    private string    $value;
    private array     $edges    = [];
    private bool      $searched = false;
    private ?BfsNode  $parent   = null;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function connect(BfsNode $neighbor): void
    {
        $this->addEdge($neighbor);
        $neighbor->addEdge($this);
    }

    public function addEdge(BfsNode $edge): void
    {
        $this->edges[] = $edge;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function markAsSearched(): void
    {
        $this->searched = true;
    }

    public function getEdges(): array
    {
        return $this->edges;
    }

    public function isSearched(): bool
    {
        return $this->searched;
    }

    public function getParent(): ?BfsNode
    {
        return $this->parent;
    }

    public function setParent(BfsNode $parent): void
    {
        $this->parent = $parent;
    }

    public function computeSearchPath(): array
    {
        $path   = [];
        $path[] = $this;
        $next   = $this->getParent();
        while (null !== $next) {
            $path[] = $next;
            $next   = $next->getParent();
        }

        return array_reverse($path);
    }

    public function reset(): void
    {
        $this->searched = false;
        $this->parent   = null;
    }
}
