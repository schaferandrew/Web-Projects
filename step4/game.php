<?php
require 'format.inc.php';
require 'lib/game.inc.php';
$view = new Wumpus\WumpusView($wumpus);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stalking the Wumpus</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>

<?php echo present_header("Stalking the Wumpus"); ?>

<div class="main">
    <figure>
        <img src="cave.jpg" height="325" width="600" alt="Picture of a cave">
    </figure>
    <div class="status">
        <?php
        echo $view->presentStatus();
        ?>
    </div>
    <div class="rooms">
<!--        <div class="room">-->
<!--            <img src="cave2.jpg" height="135" width="180" alt="Picturer of a cave">-->
<!--            <div class="arrow">-->
<!--                <p><a href="">3</a></p>-->
<!--                <p><a href="">Shoot Arrow</a></p>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--        <div class="room">-->
<!--            <img src="cave2.jpg" height="135" width="180" alt="Picturer of a cave">-->
<!--            <div class="arrow">-->
<!--                <p><a href="">13</a></p>-->
<!--                <p><a href="">Shoot Arrow</a></p>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="room">-->
<!--            <img src="cave2.jpg" height="135" width="180" alt="Picturer of a cave">-->
<!--            <div class="arrow">-->
<!--                <p><a href="">7</a></p>-->
<!--                <p><a href="">Shoot Arrow</a></p>-->
<!--            </div>-->
<!--        </div>-->
        <div class="rooms">
            <?php
            echo $view->presentRoom(0);
            echo $view->presentRoom(1);
            echo $view->presentRoom(2);
            ?>
        </div>
    </div>
    <div class="status">
        <?php
        echo $view->presentArrows();
        ?>
    </div>
</div>
</body>
</html>