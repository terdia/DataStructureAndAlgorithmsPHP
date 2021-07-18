<?php declare(strict_types=1);

namespace App\BreadthFirstSearch;

class BreadthFirstSearchResult
{
    private ?BfsNode $endNode;
    private array $path;

    public function __construct(?BfsNode $endNode, ?BfsNode ...$path)
    {
        $this->endNode = $endNode;
        $this->path    = array_filter($path);
    }

    public function getEndNode(): ?BfsNode
    {
        return $this->endNode;
    }

    /**
     * @return BfsNode[]
     */
    public function getPath(): array
    {
        return $this->path;
    }
}
