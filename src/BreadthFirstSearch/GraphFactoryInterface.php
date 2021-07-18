<?php declare(strict_types=1);

namespace App\BreadthFirstSearch;

interface GraphFactoryInterface
{
    public function getNewGraph(): Graph;
}
