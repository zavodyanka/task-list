<?php
namespace App\Filter;

use App\Model\Task;

class UserNameFilter extends \FilterIterator
{
    private $name;
   
    public function __construct(\Iterator $iterator , $filter )
    {
        parent::__construct($iterator);
        $this->name = $filter;
    }
   
    public function accept() : bool
    {
        /** @var Task $task */
        $task = $this->getInnerIterator()->current();

        if( strcasecmp($task->getUser(), $this->name) == 0) {
            return true;
        } 

        return false;
    }
}