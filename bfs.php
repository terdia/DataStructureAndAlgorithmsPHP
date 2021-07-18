<?php declare(strict_types=1);

use App\BreadthFirstSearch\Graph;
use App\BreadthFirstSearch\BreadthFirstSearch;
use App\BreadthFirstSearch\GraphFactory;

require_once __DIR__ . '/vendor/autoload.php';

ini_set('display_errors', '1');
error_reporting(E_ALL);

$bfsObject = new BreadthFirstSearch(new GraphFactory());
$graph     = $bfsObject->getGraph();

if (isset($_POST['start'], $_POST['end'])) {
    bfs($graph, $_POST['start'], $_POST['end']);
}

function bfs(Graph $graph, string $start, string $end): void
{
    $result = $graph->search($start, $end);
    if (null !== $result->getEndNode()) {
        echo 'It found ' . $result->getEndNode()->getValue() . '-';
    }
    $path = ' Search path: ';
    $iMax = count($result->getPath());
    foreach ($result->getPath() as $i => $n) {
        $path .= $n->getValue();

        if ($i < $iMax - 1) {
            $path .= ' --> ';
        }
    }

    echo $path . '<br />';
}

?>

<h2>Breadth first search:</h2>
<form id="s" method="post">
    <select name="start">
        <?php if (isset($_POST['start'])): ?>
            <option value="<?php echo $_POST['start']; ?>"><?php echo $_POST['start']; ?></option>
        <?php else: ?>
            <option value="">Select start value</option>
        <?php endif; ?>

        <?php foreach ($graph->getNodes() as $node): ?>
            <option value="<?php echo $node->getValue(); ?>"><?php echo $node->getValue(); ?></option>
        <?php endforeach; ?>
    </select>

    <select name="end">
        <?php if (isset($_POST['end'])): ?>
            <option value="<?php echo $_POST['end']; ?>"><?php echo $_POST['end']; ?></option>
        <?php else: ?>
            <option value="">Select end value</option>
        <?php endif; ?>

        <?php foreach ($graph->getNodes() as $node): ?>
            <option value="<?php echo $node->getValue(); ?>"><?php echo $node->getValue(); ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" name="Submit" value="Search">
</form>


