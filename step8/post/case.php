<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/27/18
 * Time: 7:49 PM
 */
require '../lib/site.inc.php';

echo "<pre>";
print_r($_POST);
echo "</pre>";

$controller = new Felis\CaseController($site, $_POST);
header("location: " . $controller->getRedirect());