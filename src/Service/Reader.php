<?php
declare(strict_types=1);

namespace App\Service;

use App\Model\Task;
use App\Model\User;
use App\Model\Status;
use App\Filter\UserNameFilter;

class Reader implements ReaderInterface
{
    /** @var TaskCollection */
    private $collection;

    private function init() : void
    {
        $userAlex = new User('Alex');
        $userMax = new User('Max');

        $statusNew = new Status();
        $statusNew->setName(Status::NEW);
        $statusDone = new Status();
        $statusDone->setName(Status::DONE);
        $date = date('Y-m-d H:i:s');

        $this->collection = new TaskCollection();
        $this->collection
        ->add(new Task($date, $userAlex, $statusDone, 'task title 1'))
        ->add(new Task($date, $userAlex, $statusNew, 'task title 2'))
        ->add(new Task($date, $userAlex, $statusNew, 'task title 3'))
        ->add(new Task($date, $userMax, $statusDone, 'task title 4'))
        ->add(new Task($date, $userMax, $statusNew, 'task title 5'))
        ->add(new Task($date, $userMax, $statusDone, 'task title 6'))
        ->add(new Task($date, $userMax, $statusNew, 'task title 7'));
    }

    public function getUserTaskCollection(string $name) : \Iterator
    {
        $this->init();

        return new UserNameFilter($this->collection->getIterator(), $name);
    }
}