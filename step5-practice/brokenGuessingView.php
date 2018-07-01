<?php
// Broken
namespace Guessing;


class Guessing {
	const MIN = 1;
	const MAX = 100;

	const CORRECT = 0;
	const TOOLOW = 1;
	const TOOHIGH = 2;
	const INVALID = 3;

	public function __construct($seed = null) {
		if($seed === null) {
			$seed = time();
		}

		srand($seed);
		$this->number = rand(self::MIN, self::MAX);
	}

	public function getNumber() {
		return $this->number;
	}

	public function guess($num) {
		$this->theGuess = $num;
		if($this->check() != self::INVALID) {
			$this->numGuesses++;
		}
	}

	public function getGuess() {
		return $this->theGuess;
	}

	public function getNumGuesses() {
		return $this->numGuesses;
	}

	public function check() {
		$guess = $this->theGuess;

		if(!is_numeric($guess) || $guess < self::MIN || $guess > self::MAX) {
			return self::INVALID;
		} else if($guess < $this->number) {
			return self::TOOLOW;
		} else if($guess > $this->number) {
			return self::TOOHIGH;
		}
	}

	private $number;

	private $theGuess = 1;
	private $numGuesses = 0;
}


/**
 * View class for the guessing game.
 */
class GuessingView {
	/** Constructor
	 * @param $guessing Guessing game object */
	public function __construct(Guessing $guessing) {
		$this->guessing = $guessing;
	}

	/**
	 * Create the HTML we present
	 * @return string HTML to present
	 */
	public function present() {
		// All begins with this...
		$html = '<form method="post" action="guessing-post.php">' .
			'<h1>Guessing Game</h1>';

		// Save in handy variables
		$check = $this->guessing->check();
		$num = $this->guessing->getNumGuesses();

		if($check == Guessing::INVALID) {


		} else if($num == 0) {
			//
			// New game, no guesses, yet.
			//
			$html .= <<<HTML
<p class="message">Try to guess the number.</p>
<p><label for="value">Guess:</label> <input type="text" name="value" id="value"></p>
<p><input type="submit"></p>
HTML;

		} else if($check == Guessing::CORRECT) {
			//
			// The guess was correct
			//
			$html .= <<<HTML
<p class="message">After $num guesses you are correct!</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
HTML;

		} else {
			//
			// Too high or low
			//
			$msg = $check == Guessing::TOOLOW ? "too low" : "too high";
			$html .= <<<HTML
    <p class="message">After $num guesses you are $msg!</p>
    <p><label for="value">Guess:</label> <input type="text" name="value" id="value"></p>
    <p><input type="submit"></p>
HTML;

		}

		// All ends with this
		$html .= '<p><input type="submit" name="clear" value="New Game"></p></form>';

		return $html;
	}

	private $guessing;	// Guessing object
}
