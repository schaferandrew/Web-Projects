<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/26/18
 * Time: 9:59 PM
 */
require '../lib/site.inc.php';

//echo "<pre>";
//print_r($_POST);
//echo "</pre>";

$controller = new Felis\NewCaseController($site, $user, $_POST);
header("location: " . $controller->getRedirect());