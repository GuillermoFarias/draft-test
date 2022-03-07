<?php

namespace App\Commands;

use App\Martian;
use App\Reader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MartianCommand extends Command
{
    protected static $defaultName = 'martian:run';

    /**
     * execute
     *
     * @param  mixed $input
     * @param  mixed $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $reader = new Reader();
        $reader->readFile('input.txt');
        $surface = $reader->getSurface();

        $martian = new Martian();
        $martian->fillSurface($surface[0], $surface[1]);
        $output = $martian->walk($reader->getInstructions());

        print_r($output);
        return Command::SUCCESS;
    }
}
