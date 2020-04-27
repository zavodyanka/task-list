<?php
declare(strict_types=1);

namespace App\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class CreateUserCommandTest extends KernelTestCase
{
    public function testCommandExecute()
    {
        $kernel = static::createKernel();
        $application = new Application($kernel);

        $command = $application->find('tasks-list');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'name' => 'Alex',
        ]);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('task title 2', $output);
    }
}