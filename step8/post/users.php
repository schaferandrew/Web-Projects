<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/27/18
 * Time: 10:30 PM
 */

require '../lib/site.inc.php';

$controller = new Felis\UsersController($site, $user, $_POST);
header("location: " . $controller->getRedirect());