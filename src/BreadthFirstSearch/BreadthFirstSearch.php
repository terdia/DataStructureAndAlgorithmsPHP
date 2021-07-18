<?php declare(strict_types=1);

namespace App\BreadthFirstSearch;

class BreadthFirstSearch
{
    private Graph $graph;

    public function __construct(GraphFactoryInterface $graphFactory)
    {
        $this->graph = $graphFactory->getNewGraph();
    }

    public function getGraph(): Graph
    {
        return $this->graph;
    }
}
