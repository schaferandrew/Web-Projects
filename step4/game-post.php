<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 2/6/18
 * Time: 8:22 PM
 */

require 'lib/game.inc.php';
$controller = new Wumpus\WumpusController($wumpus, $_REQUEST);
if($controller->isReset()) {
    unset($_SESSION[WUMPUS_SESSION]);
}
if($controller->isCheat()) {
    unset($_SESSION[WUMPUS_SESSION]);
    $_SESSION[WUMPUS_SESSION] = new Wumpus\Wumpus(1422668587);
}

header('Location: ' . $controller->getPage());