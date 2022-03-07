<?php

namespace App\Martian;

class Instruction
{
    /** @var int */
    private $positionX = 0;

    /** @var int */
    private $positionY = 0;

    /** @var int */
    private $orientation = 'N';

    /** @var string */
    private $instructions = 'R';

    /**
     * __construct
     *
     * @param  mixed $position
     * @param  mixed $instructions
     * @return void
     */
    public function __construct(string $position, string $instructions)
    {
        $this->readPositions($position);
        $this->instructions = $instructions;
    }

    /**
     * readPositions
     *
     * @param  mixed $position
     * @return void
     */
    private function readPositions(string $position): void
    {
        $position = explode(' ', $position);
        $this->positionX = $position[0];
        $this->positionY = $position[1];
        $this->orientation = $position[2];
    }

    /**
     * Get the value of positionX
     *
     * @return int
     */
    public function getPositionX(): int
    {
        return $this->positionX;
    }

    /**
     * Get the value of positionY
     *
     * @return int
     */
    public function getPositionY(): int
    {
        return $this->positionY;
    }

    /**
     * Get the value of orientation
     *
     * @return string
     */
    public function getOrientation(): string
    {
        return $this->orientation;
    }

    /**
     * Get the value of instructions
     *
     * @return array
     */
    public function getInstructions(): array
    {
        return str_split($this->instructions);
    }
}
