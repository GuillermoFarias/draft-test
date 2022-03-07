<?php

namespace Tests\Unit;

use App\Martian\Instruction;
use PHPUnit\Framework\TestCase;

class InstructionTest extends TestCase
{
    public function testPositionAndOrientation(): void
    {
        $input = '1 2 N';
        $instruction = new Instruction($input, 'R');
        $this->assertEquals(1, $instruction->getPositionX());
        $this->assertEquals(2, $instruction->getPositionY());
        $this->assertEquals('N', $instruction->getOrientation());
    }

    public function testInstructions(): void
    {
        $input = '1 2 N';
        $instructions = 'RLRLRLRLRL'; # 10 directions
        $instruction = new Instruction($input, $instructions);

        $this->assertEquals(10, count($instruction->getInstructions()));
        $this->assertEquals('L', $instruction->getInstructions()[1]);
    }
}
