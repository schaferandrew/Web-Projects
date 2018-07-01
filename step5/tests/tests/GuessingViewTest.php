<?php
require __DIR__ . "/../../vendor/autoload.php";

/** @file
 * Empty unit testing template
 * @cond
 * Unit tests for the class
 */
class EmptyTest extends \PHPUnit_Framework_TestCase
{
    const SEED = 1234;

    public function test_construct() {
        $guessing = new Guessing\Guessing(self::SEED);
        $view = new Guessing\GuessingView($guessing);

        $this->assertInstanceOf('Guessing\GuessingView', $view);
    }
    public function test_present() {
        //Blank
        $guessing = new Guessing\Guessing(self::SEED);
        $view = new Guessing\GuessingView($guessing);

        $this->assertContains('<form method="post" action="guessing-post.php">', $view->present());
        $this->assertContains('<h1>Guessing Game</h1>', $view->present());

        //Invalid
        $guessing->guess(-1);
        //echo htmlentities($view->present());
        $this->assertContains('Your guess of -1 is invalid!',$view->present());

        //Start
        $guessing = new \Guessing\Guessing(self::SEED);
        $view = new \Guessing\GuessingView($guessing);
        $num = $guessing->getNumGuesses();
        if ($num == 0) {
            $this->assertContains('<p class="message">Try to guess the number.</p>
<p><label for="value">Guess:</label> <input type="text" name="value" id="value"></p>
<p><input type="submit"></p>', $view->present());
       }

        //Too Low
        $guessing = new \Guessing\Guessing(self::SEED);
        $view = new \Guessing\GuessingView($guessing);
        $html = '<form method="post" action="guessing-post.php">' .
            '<h1>Guessing Game</h1>';
        $ending = '<p><input type="submit" name="clear" value="New Game"></p></form>';
        $guessing->guess(15);
        $num = $guessing->getNumGuesses();
        $msg = "too low";
        $html .= <<<HTML
    <p class="message">After $num guesses you are $msg!</p>
    <p><label for="value">Guess:</label> <input type="text" name="value" id="value"></p>
    <p><input type="submit"></p>
HTML;
        $html .= $ending;
        $this->assertContains($html,$view->present());

        //Too High
        $guessing->guess(90);
        $num = $guessing->getNumGuesses();
        $msg = "too high";
        $html = <<<HTML
    <p class="message">After $num guesses you are $msg!</p>
    <p><label for="value">Guess:</label> <input type="text" name="value" id="value"></p>
    <p><input type="submit"></p>
HTML;
        $html .= $ending;
        $this->assertContains($html, $view->present());

        //Correct
        $guessing = new \Guessing\Guessing(self::SEED);
        $view = new \Guessing\GuessingView($guessing);
        $html = '<form method="post" action="guessing-post.php">' .
            '<h1>Guessing Game</h1>';
        $ending = '<p><input type="submit" name="clear" value="New Game"></p></form>';
        $guessing->guess(23);
        $num = $guessing->getNumGuesses();
        $html .= <<<HTML
<p class="message">After $num guesses you are correct!</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
HTML;
        $html .= $ending;
        $this->assertContains($html,$view->present());
    }


}

/// @endcond
