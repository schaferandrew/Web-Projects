<?php

namespace Guessing;

class Guessing {
    const MIN = 1;
    const MAX = 100;

    const INVALID = 0;
    const CORRECT = 1;
    const TOOLOW = 2;
    const TOOHIGH = 3;
    const START = 4;

    public function __construct($seed = null) {
        if($seed === null) {
            $seed = time();
        }

        srand($seed);
        $this->number = rand(self::MIN, self::MAX);
        $this->numGuesses=0;
        $this->start = true;
    }

    public function getNumber() {
        return $this->number;
    }
    public function getNumGuesses() {
        return $this->numGuesses;
    }
    public function check() {
        if ($this->numGuesses==0 && $this->start == true) {
            return self::START;
        } else if($this->guess > self::MAX || $this->guess < self::MIN) {
            return self::INVALID;
        } else if ($this->guess > $this->number) {
            return self::TOOHIGH;
        } else if ($this->guess == $this->number) {
            return self::CORRECT;
        } else {
            return self::TOOLOW;
        }
    }
    public function guess($g) {
        $this->guess = $g;
        $this->start = false;
        if ($this->guess <= self::MAX && $this->guess >= self::MIN ) {
            $this->numGuesses++;
        }
    }
    public function getGuess() {
        return $this->guess;
    }
    private $number;
    private $numGuesses;
    private $guess;
    private $start;
}