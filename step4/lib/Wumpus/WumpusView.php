<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2/6/18
 * Time: 7:23 PM
 */
namespace Wumpus;

class WumpusView
{
    private $wumpus;    // The Wumpus object

    /**
     * Constructor
     * @param Wumpus $wumpus The Wumpus object
     */
    public function __construct(Wumpus $wumpus) {
        $this->wumpus = $wumpus;
    }
    /** Generate the HTML for the number of arrows remaining */
    public function presentArrows() {
        $a = $this->wumpus->numArrows();
        return "<p>You have $a arrows remaining.</p>";
    }

    public function presentStatus() {
        $roomNum = $this->wumpus->getCurrent()->getNum();
        $html = "<p>You are in room $roomNum</p>";
        if ($this->wumpus->smellWumpus()) {
            $html .= "<p>You smell a wumpus!</p>";
        }
        if ($this->wumpus->wasCarried()) {
            $html .= "<p>You were carried by the birds!</p>";
        }
        if ($this->wumpus->feelDraft()) {
            $html .= "<p>You feel a draft!</p>";
        }
        if ($this->wumpus->hearBirds()) {
            $html .= "<p>You hear birds!</p>";
        }
        return $html;
    }

    /** Present the links for a room
     * @param $ndx An index 0 to 2 for the three rooms */
    public function presentRoom($ndx) {
        $room = $this->wumpus->getCurrent()->getNeighbors()[$ndx];
        $roomnum = $room->getNum();
        $roomndx = $room->getNdx();
        $roomurl = "game-post.php?m=$roomndx";
        $shooturl = "game-post.php?s=$roomndx";

        $html = <<<HTML
<div class="room">
  <img src="cave2.jpg" width="180" height="135" alt="Picture of a cave"/>
  <div class="arrow">
    <p><a href="$roomurl">$roomnum</a></p>
    <p><a href="$shooturl">Shoot Arrow</a></p>
  </div>
</div>
HTML;

        return $html;
    }
}