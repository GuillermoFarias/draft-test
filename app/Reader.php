<?php

namespace App;

use App\Martian\Instruction;

class Reader
{
    /** @var array lines of file */
    public $lines = [];

    /**
     * read.
     *
     * @param string $filePath
     *
     * @return void
     */
    public function readFile(string $filePath): void
    {
        $file = file($filePath);
        $file = array_map(function ($line) {
            return trim($line);
        }, $file);

        $this->lines = $file;
    }

    /**
     * getSurface.
     *
     * @return array
     */
    public function getSurface(): array
    {
        return explode(' ', $this->lines[0]);
    }

    /**
     * getInstructions.
     *
     * @return array
     */
    public function getInstructions(): array
    {
        $instructions = [];
        for ($i = 1; $i < count($this->lines); $i += 2) {
            $instructions[] = new Instruction($this->lines[$i], $this->lines[$i + 1]);
        }

        return $instructions;
    }
}
