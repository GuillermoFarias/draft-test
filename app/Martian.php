<?php

namespace App;

use App\Martian\Instruction;
use App\Martian\Surface;

class Martian
{
    /** @var \App\Martian\Surface */
    private $surface = null;

    /**
     * fillSurface.
     *
     * @param int $x
     * @param int $i
     *
     * @return void
     */
    public function fillSurface(int $x, int $i): void
    {
        $this->surface = new Surface();
        $this->surface->fill($x, $i);
    }

    /**
     * walk.
     *
     * @param mixed $instructions
     *
     * @return array
     */
    public function walk(array $instructions): array
    {
        $output = [];
        $blackList = [];

        foreach ($instructions as $instruction) {
            $move = $this->move($instruction, $blackList);
            if (key_exists('LOST', $move)) {
                $blackList[] = implode('-', $move);
            }
            $output[] = $move;
        }

        return $output;
    }

    /**
     * walk.
     *
     * @param \App\Martian\Instruction $instruction
     *
     * @return array
     */
    public function move(Instruction $instruction, array $blackList): array
    {
        $this->surface->setInitialPosition(
            $instruction->getPositionX(),
            $instruction->getPositionY(),
            $instruction->getOrientation()
        );

        foreach ($instruction->getInstructions() as $instruction) {
            if (in_array(implode('-', $this->surface->getPosition()), $blackList)) {
                continue;
            }

            switch ($instruction) {
                case 'L':
                    $this->surface->turnLeft();
                    break;
                case 'R':
                    $this->surface->turnRight();
                    break;
                case 'F':
                    $this->surface->moveForward();
                    break;
            }

            if ($this->surface->verifyIsOutOfBounds()) {
                return $this->surface->getPosition() + ['LOST' => true];
            }
        }

        return $this->surface->getPosition();
    }
}
