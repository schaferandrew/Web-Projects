<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 4/23/18
 * Time: 6:51 PM
 */
require '../lib/site.inc.php';

$controller = new Noir\StarController($site, $user, $_POST);
echo $controller->getResult();