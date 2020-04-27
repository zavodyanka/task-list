<?php
declare(strict_types=1);

namespace App\Tests\Model;

use PHPUnit\Framework\TestCase;
use App\Model\Status;

class StatusTest extends TestCase
{
    public function testCorrectStatusName()
    {
        $name = Status::NEW;
        $status = new Status($name);

        $this->assertEquals($name, $status->getName());
    }

    public function testWrongStatusName()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $name = 'in progress';
        $status = new Status($name);
    }
}