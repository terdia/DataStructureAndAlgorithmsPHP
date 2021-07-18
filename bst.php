<?php declare(strict_types=1);

use App\BinarySearchTree\BsTree;

require_once __DIR__ . '/vendor/autoload.php';

ini_set('display_errors', '1');
error_reporting(E_ALL);

$tree = new BsTree();
/* for ($i = 0; $i < 10; $i++) {
    $tree->addValue(random_int(0, 100));
}*/
$tree->addValue(7);
$tree->addValue(9);
$tree->addValue(3);
$tree->addValue(1);
$tree->addValue(5);
$tree->addValue(8);

echo '<br /> Ordered list: ';
var_dump($tree->traverse());

echo '<br /> Search result: ';
$result = $tree->search(5);
echo $result->getValue();

echo '<br /> Reversed list: ';
$tree->reverse();
var_dump($tree->traverse());

$tree->reverse();
echo '<br /> Reset: ';
$tree->traverse();
echo '<br /> Search : ';
$result = $tree->search(3);
echo $result->getValue();






