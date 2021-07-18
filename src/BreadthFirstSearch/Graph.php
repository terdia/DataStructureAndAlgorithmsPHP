<?php declare(strict_types=1);

namespace App\BreadthFirstSearch;

use function array_shift;

class Graph
{
    private array   $nodes = [];
    private array   $graph = [];

    private function __construct()
    {
    }

    public function addNode(BfsNode $node): void
    {
        $this->nodes[]                  = $node;
        $this->graph[$node->getValue()] = $node;
    }

    public function getNode(string $value): ?BfsNode
    {
        return $this->graph[$value] ?? null;
    }

    public function getNodes(): array
    {
        return $this->nodes;
    }

    public function search(string $startLabel, string $endLabel): BreadthFirstSearchResult
    {
        $this->resetNodes();
        $queue     = [];
        $startNode = $this->graph[$startLabel] ?? null;
        $endNode   = $this->graph[$endLabel] ?? null;

        if (null !== $startNode && null !== $endNode) {
            $startNode->markAsSearched();
            $queue[] = $startNode;

            while (0 < count($queue)) {
                /** @var BfsNode $current */
                $current = array_shift($queue);
                if ($current === $endNode) {
                    return new BreadthFirstSearchResult(
                        $current,
                        ...$current->computeSearchPath()
                    );
                }
                $queue = $this->searchEdges($current, $queue);
            }
        }

        return new BreadthFirstSearchResult(null, null);
    }

    private function searchEdges(BfsNode $current, array $queue): array
    {
        /** @var BfsNode $edge */
        foreach ($current->getEdges() as $edge) {
            if (false === $edge->isSearched()) {
                $edge->markAsSearched();
                $edge->setParent($current);
                $queue[] = $edge;
            }
        }

        return $queue;
    }

    private function resetNodes(): void
    {
        /** @var BfsNode $node */
        foreach ($this->getNodes() as $node) {
            $node->reset();
        }
    }

    public static function getNew(): Graph
    {
        return new self();
    }
}
