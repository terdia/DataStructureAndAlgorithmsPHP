<?php declare(strict_types=1);

namespace Tests\BreadthFirstSearch;

use App\BreadthFirstSearch\BfsNode;
use App\BreadthFirstSearch\BreadthFirstSearch;
use App\BreadthFirstSearch\Graph;
use App\BreadthFirstSearch\GraphFactory;
use PHPUnit\Framework\TestCase;

use function array_map;

class BreadthFirstSearchTest extends TestCase
{
    public function testAddAndGetNode(): void
    {
        $graph = Graph::getNew();
        $graph->addNode(new BfsNode('first'));
        $graph->addNode(new BfsNode('second'));

        $node = $graph->getNode('first');

        self::assertSame($node->getValue(), 'first');
        self::assertCount(2, $graph->getNodes());
    }

    public function testSearchWithGivenStartAndEndValueReturnsAMatchingResult(): void
    {
        $bfsObject = new BreadthFirstSearch(new GraphFactory());
        $graph     = $bfsObject->getGraph();

        $result = $graph->search("Rachel McAdams", "Kevin Bacon");

        self::assertInstanceOf(BfsNode::class, $result->getEndNode());
        self::assertSame("Kevin Bacon", $result->getEndNode()->getValue());
    }

    public function testItCanComputeSearchPath(): void
    {
        $bfsObject = new BreadthFirstSearch(new GraphFactory());
        $graph     = $bfsObject->getGraph();
        //see data.json
        $expectedPathValues = [
            "Rachel McAdams", // acted in spotlight with Billy Crudup
            "Spotlight",
            "Billy Crudup", // acted in Eat Pray Love with Julia Roberts
            "Eat Pray Love",
            "Julia Roberts", // acted in Flatliners with Kevin Bacon
            "Flatliners",
            "Kevin Bacon",
        ];

        $result = $graph->search("Rachel McAdams", "Kevin Bacon");

        $pathValues = array_map(
            static fn(BfsNode $bfsNode) => $bfsNode->getValue(),
            $result->getPath()
        );

        self::assertSame($expectedPathValues, $pathValues);
    }

    public function testNoResultFound(): void
    {
        $bfsObject = new BreadthFirstSearch(new GraphFactory());
        $graph     = $bfsObject->getGraph();

        $result = $graph->search("Rachel McAdams", "Terry O");

        self::assertNull($result->getEndNode());
        self::assertEmpty($result->getPath());
    }
}
