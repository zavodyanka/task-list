<?php
declare(strict_types=1);

namespace App\Service;

interface ReaderInterface 
{
    public function getUserTaskCollection(string $name) : \Iterator;
}