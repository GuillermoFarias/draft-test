<?php

namespace App\Martian;

class Surface
{
    /** @var array grid */
    private $surfaceGrid = [];

    /** @var int */
    private $positionX = 0;

    /** @var int */
    private $positionY = 0;

    /** @var int */
    private $orientation = 'N';

    /** @var array grid */
    private $backupPosition = [];

    /**
     * fill
     * complete the surface grid with the given input.
     *
     * @param int $x
     * @param int $y
     *
     * @return array
     */
    public function fill(int $x, int $y): array
    {
        for ($i = 0; $i < $x; $i++) {
            $this->surfaceGrid[$i] = array_fill(0, $y, 'in');
        }

        return $this->surfaceGrid;
    }

    /**
     * setInitialPosition
     * set the initial position of the rover.
     *
     * @param int    $x
     * @param int    $y
     * @param string $orientation
     *
     * @return void
     */
    public function setInitialPosition(int $x, int $y, string $orientation): void
    {
        $this->positionX = $x;
        $this->positionY = $y;
        $this->orientation = $orientation;
    }

    /**
     * moveForward.
     *
     * @return void
     */
    public function moveForward(): void
    {
        $this->backupPosition();

        switch ($this->orientation) {
            case 'N':
                $this->positionY++;
                break;
            case 'E':
                $this->positionX++;
                break;
            case 'S':
                $this->positionY--;
                break;
            case 'W':
                $this->positionX--;
                break;
        }
    }

    /**
     * moveBackward.
     *
     * @return void
     */
    public function moveBackward(): void
    {
        $this->backupPosition();

        switch ($this->orientation) {
            case 'N':
                $this->positionY--;
                break;
            case 'E':
                $this->positionX--;
                break;
            case 'S':
                $this->positionY++;
                break;
            case 'W':
                $this->positionX++;
                break;
        }
    }

    /**
     * turnLeft.
     *
     * @return void
     */
    public function turnLeft(): void
    {
        $this->backupPosition();

        switch ($this->orientation) {
            case 'N':
                $this->orientation = 'W';
                break;
            case 'E':
                $this->orientation = 'N';
                break;
            case 'S':
                $this->orientation = 'E';
                break;
            case 'W':
                $this->orientation = 'S';
                break;
        }
    }

    /**
     * turnRight.
     *
     * @return void
     */
    public function turnRight(): void
    {
        $this->backupPosition();

        switch ($this->orientation) {
            case 'N':
                $this->orientation = 'E';
                break;
            case 'E':
                $this->orientation = 'S';
                break;
            case 'S':
                $this->orientation = 'W';
                break;
            case 'W':
                $this->orientation = 'N';
                break;
        }
    }

    /**
     * getPosition.
     *
     * @return array
     */
    public function getPosition(): array
    {
        return [$this->positionX, $this->positionY, $this->orientation];
    }

    /**
     * verifyIsOutOfBounds.
     *
     * @return bool
     */
    public function verifyIsOutOfBounds(): bool
    {
        $out = !isset($this->surfaceGrid[$this->positionX])
            || !isset($this->surfaceGrid[$this->positionX][$this->positionY]);

        return $out;
    }

    /**
     * backupPosition.
     *
     * @return void
     */
    public function backupPosition(): void
    {
        $this->backupPosition = $this->getPosition();
    }

    /**
     * restorePosition.
     *
     * @return void
     */
    public function getLastPosition(): array
    {
        return $this->backupPosition;
    }
}
