<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\Service\ReaderInterface;
use App\Model\Task;

class ListCommand extends Command   
{
    protected static $defaultName = "tasks-list";
    
    /** @var ReaderInterface */
    private $readerService;

    public function __construct(ReaderInterface $reader)
    {
        $this->readerService = $reader;

        parent::__construct(self::$defaultName);
    }

    protected function configure()
    {
        $this
            ->addArgument('name', InputArgument::REQUIRED, 'User name (Max or Alex).');
        }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        /** @var Task $value */
        foreach ($this->readerService->getUserTaskCollection($name) as $value) {
            $output->write($value->getTitle() . "\n");
        }
        
        return 0;
    }
}