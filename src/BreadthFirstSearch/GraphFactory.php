<?php declare(strict_types=1);

namespace App\BreadthFirstSearch;

class GraphFactory implements GraphFactoryInterface
{
    public function getNewGraph(): Graph
    {
        $data = json_decode(
            file_get_contents(__DIR__ . '/../../data.json'),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        $graph = Graph::getNew();
        foreach ($data['movies'] as $i => $iValue) {
            $title     = $iValue['title'];
            $cast      = $iValue['cast'];
            $movieNode = new BfsNode($title);
            $graph->addNode($movieNode);

            foreach ($cast as $jValue) {
                $actor     = $jValue;
                $actorNode = $graph->getNode($actor);
                if (null === $actorNode) {
                    $actorNode = new BfsNode($actor);
                }
                $graph->addNode($actorNode);
                $movieNode->connect($actorNode);
            }
        }

        return $graph;
    }

}
