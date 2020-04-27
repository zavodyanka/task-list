<?php
declare(strict_types=1);

namespace App\Service;

use App\Model\Task;

/**
* Interface for The Collection class that contains Offers
*/
interface TaskCollectionInterface 
{
    public function add(Task $task): TaskCollectionInterface;
    
    public function get(int $index): Task;
    
    public function getIterator(): \ArrayIterator;
}