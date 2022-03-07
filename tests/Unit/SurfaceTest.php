<?php

namespace Tests\Unit;

use App\Martian\Surface;
use PHPUnit\Framework\TestCase;

class SurfaceTest extends TestCase
{
    public function testFillGrid(): void
    {
        $surface = new Surface();
        $grid = $surface->fill(5, 9);

        $this->assertEquals(5, count($grid));
        $this->assertEquals(9, count($grid[0]));
    }

    public function testMovement(): void
    {
        $surface = new Surface();
        $surface->fill(5, 5);

        $surface->setInitialPosition(0, 0, 'N');

        $surface->moveForward();
        $surface->turnRight();
        $surface->moveForward();
        $this->assertEquals([1, 1, 'E'], $surface->getPosition());
        $surface->turnRight();
        $surface->moveForward();
        $this->assertEquals([1, 0, 'S'], $surface->getPosition());
        $surface->turnRight();
        $surface->moveForward();
        $this->assertEquals([0, 0, 'W'], $surface->getPosition());
        $surface->moveBackward();
        $this->assertEquals([1, 0, 'W'], $surface->getPosition());
        $surface->turnLeft();
        $surface->moveBackward();
        $this->assertEquals([1, 1, 'S'], $surface->getPosition());
        $surface->turnLeft();
        $surface->moveBackward();
        $this->assertEquals([0, 1, 'E'], $surface->getPosition());
        $surface->turnLeft();
        $surface->moveBackward();
        $this->assertEquals([0, 0, 'N'], $surface->getPosition());
        $surface->turnLeft();
        $surface->moveBackward();
        $this->assertEquals([1, 0, 'W'], $surface->getPosition());
        $surface->turnRight();
        $this->assertEquals([1, 0, 'N'], $surface->getPosition());
    }

    public function testVerifyIsOutOfBounds(): void
    {
        $surface = new Surface();
        $surface->fill(5, 5);

        $surface->setInitialPosition(8, 8, 'N');
        $this->assertTrue($surface->verifyIsOutOfBounds());
    }

    public function testBackupPosition(): void
    {
        $surface = new Surface();
        $surface->fill(5, 5);

        $surface->setInitialPosition(1, 1, 'N');

        $surface->moveForward();
        $surface->turnLeft();
        $this->assertEquals([1, 2, 'W'], $surface->getPosition());
        $this->assertEquals([1, 2, 'N'], $surface->getLastPosition());
    }
}
