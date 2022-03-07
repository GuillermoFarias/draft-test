<?php

namespace Tests\Unit;

use App\Reader;
use PHPUnit\Framework\TestCase;

class ReaderTest extends TestCase
{
    public function testReadFile(): void
    {
        $reader = new Reader();
        $reader->readFile(__DIR__.'/../input.test.txt');

        $this->assertEquals(5, $reader->getSurface()[0]);
        $this->assertEquals(3, $reader->getSurface()[1]);
    }

    public function testGetInstructions(): void
    {
        $reader = new Reader();
        $reader->readFile(__DIR__.'/../input.test.txt');

        $instructions = $reader->getInstructions();

        $this->assertEquals(3, count($instructions));
        $this->assertEquals('W', $instructions[2]->getOrientation());
    }
}
