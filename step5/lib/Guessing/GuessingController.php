<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2/13/18
 * Time: 8:27 PM
 */

namespace Guessing;


class GuessingController
{
    private $guessing;                // The Wumpus object we are controlling
    private $page = 'guessing.php';     // The next page we will go to
    private $reset = false;         // True if we need to reset the game
    private $cheat = false;         // True if cheat mode is enabled

    /**
     * Constructor
     * @param Wumpus $wumpus The Wumpus object
     * @param $request The $_REQUEST array
     */
    public function __construct(Guessing $guessing, $post) {
        $this->guessing = $guessing;
        if(isset($post['clear'])) {
            $this->reset = true;
        } else if(isset($post['value'])) {
            $this->guessing->guess(strip_tags($post['value']));
        }
    }

    public function getPage() {
        return $this->page;
    }

    public function isReset() {
        return $this->reset;
    }

    public function isCheat() {
        return $this->cheat;
    }


}