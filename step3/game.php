<?php
require 'format.inc.php';
require 'wumpus.inc.php';
$arrow = -1;
$room = 1; // The room we are in.
$birds = 7;  // Room with the birds
$pits = array(3, 10, 13);    // Rooms with a bottomless pit
$wumpus = 16;
$cave = cave_array(); // Get the cave
if(isset($_GET['r']) && isset($cave[$_GET['r']])) {
    // We have been passed a room number
    $room = $_GET['r'];
}
if(isset($_GET['a']) && isset($cave[$_GET['a']])) {
    $arrow = $_GET['a'];
}
if($room == $birds) {
    $room = 10;
}
if(in_array($room, $pits)) {
    header("Location: lose.php");
    exit;
}
if($room==$wumpus) {
    header("Location: lose.php");
    exit;
}
if($arrow==$wumpus) {
    header("Location: win.php");
    exit;
}
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
        echo '<p>' . date("g:ia l, F j, Y") . '</p>'
        ?>
        <p>You are in room <?php echo $room; ?></p>
        <br>
        <?php
            if ($cave[$room][0] == $birds || $cave[$room][1] == $birds || $cave[$room][2] == $birds) {
                echo "<p> You hear birds!</p>";
            }
            if (in_array($pits[0], $cave[$room]) || in_array($pits[1], $cave[$room]) || in_array($pits[2], $cave[$room])) {
                echo " <p> You feel a draft!</p>";
            }
            $wumpusClose = false;
            foreach ($cave[$room] as $val) {
                if (in_array($wumpus, $cave[$val])) {
                    $wumpusClose = true;
                }
            }
            if (in_array($wumpus, $cave[$room]) || $wumpusClose) {
                echo "<p> You smell a wumpus!</p>";
            }
        ?>
    </div>
    <div class="rooms">
        <div class="room">
            <img src="cave2.jpg" height="135" width="180" alt="Picturer of a cave">
            <div class="arrow">
                <p><a href="game.php?r=<?php echo $cave[$room][0]; ?>"><?php echo $cave[$room][0]; ?></a></p>
                <p><a href="game.php?r=<?php echo $room; ?>&a=<?php echo $cave[$room][0]; ?>">Shoot Arrow</a></p>
            </div>

        </div>
        <div class="room">
            <img src="cave2.jpg" height="135" width="180" alt="Picturer of a cave">
            <div class="arrow">
                <p><a href="game.php?r=<?php echo $cave[$room][1]; ?>"><?php echo $cave[$room][1]; ?></a></p>
                <p><a href="game.php?r=<?php echo $room; ?>&a=<?php echo $cave[$room][1]; ?>">Shoot Arrow</a></p>
            </div>
        </div>
        <div class="room">
            <img src="cave2.jpg" height="135" width="180" alt="Picturer of a cave">
            <div class="arrow">
                <p><a href="game.php?r=<?php echo $cave[$room][2]; ?>"><?php echo $cave[$room][2]; ?></a></p>
                <p><a href="game.php?r=<?php echo $room; ?>&a=<?php echo $cave[$room][2]; ?>">Shoot Arrow</a></p>
            </div>
        </div>
    </div>
    <div class="status">
        <p>You have 3 arrows remaining.</p>
    </div>
</div>
</body>
</html>