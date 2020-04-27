<?php
declare(strict_types=1);

namespace App\Service;

use App\Service\TaskCollectionInterface;
use App\Model\Task;

class TaskCollection implements TaskCollectionInterface, \IteratorAggregate
{
    /** @var Task[] */
    protected $tasks = [];
    protected $filterIterator;

    public function add(Task $task): TaskCollectionInterface
    {
        \array_push($this->tasks, $task);

        return $this;
    }
    
    public function get(int $index): Task
    {
        return $this->tasks[$index];
    }
    
    public function getIterator(): \ArrayIterator
    {
        $obj = new \ArrayObject($this->tasks);

        return $obj->getIterator();
    }
}
