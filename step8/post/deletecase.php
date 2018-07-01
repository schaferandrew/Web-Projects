<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/28/18
 * Time: 8:16 PM
 */
require '../lib/site.inc.php';
$controller = new Felis\DeleteCaseController($site, $_GET, $_POST);
header("location: ". $controller->getRedirect());