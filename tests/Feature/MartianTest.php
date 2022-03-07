<?php

namespace Tests\Unit;

use App\Martian;
use App\Martian\Instruction;
use App\Reader;
use PHPUnit\Framework\TestCase;

class MartianTest extends TestCase
{
    public function testMovement(): void
    {
        $reader = $this->getMockReader();
        $surface = $reader->getSurface();

        $martian = new Martian();
        $martian->fillSurface($surface[0], $surface[1]);
        $output = $martian->walk($reader->getInstructions());

        $this->assertEquals(
            [
                ['1', '1', 'E'],
                ['3', '3', 'N', 'LOST' => 1],
            ],
            $output
        );
    }

    public function testInstructions(): void
    {
        $input = '1 2 N';
        $instructions = 'RLRLRLRLRL'; // 10 directions
        $instruction = new Instruction($input, $instructions);

        $this->assertEquals(10, count($instruction->getInstructions()));
        $this->assertEquals('L', $instruction->getInstructions()[1]);
    }

    private function getMockReader(): Reader
    {
        /** @var \PHPUnit\Framework\MockObject\MockObject&\App\Reader */
        $reader = $this->createPartialMock(Reader::class, ['getSurface', 'getInstructions']);

        $instructions[] = new Instruction('1 1 E', 'RFRFRFRF');
        $instructions[] = new Instruction('3 2 N', 'LRFRRFLLFFRRFLL');
        $reader->method('getSurface')->willReturn([5, 3]);
        $reader->method('getInstructions')->willReturn($instructions);

        return $reader;
    }
}
