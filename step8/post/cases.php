<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/26/18
 * Time: 8:09 PM
 */

require '../lib/site.inc.php';

$controller = new Felis\CasesController($site, $_POST);
//header("location: " . $controller->getRedirect());
echo '<a href="' . $controller->getRedirect() . '">' .
    $controller->getRedirect() . '</a>';
echo "<pre>";
print_r($_POST);
echo "</pre>";