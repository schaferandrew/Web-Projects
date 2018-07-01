<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/20/18
 * Time: 10:15 PM
 */
require '../lib/site.inc.php';
unset($_SESSION['user']);
header("location: " . "../$root");