<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/28/18
 * Time: 12:32 AM
 */
require '../lib/site.inc.php';
$controller = new \Felis\PasswordValidateController($site,$_POST);
header("location: " . $controller->getRedirect());
//echo '<a href="' . $controller->getRedirect() . '">' .
//    $controller->getRedirect() . '</a>';
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";