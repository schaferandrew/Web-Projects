<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 3/28/18
 * Time: 12:27 AM
 */
$open = true;
require 'lib/site.inc.php';
$view = new Felis\PasswordValidateView($site, $_GET);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>

<body>
<div class="login">

    <?php
    echo $view->header();
    echo $view->present();
    echo $view->footer();
    ?>

</div>

</body>
</html>