<?php
require 'format.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Winner</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php echo present_header("Stalking the Wumpus"); ?>

<div class="main">
    <figure>
        <img src="dead-wumpus.jpg" height="325" width="600" alt="Image of Dead Wumpus">
    </figure>
    <div class="status">
        <p>You Killed the Wumpus</p>
    </div>
    <div class="links">
        <p><a href="welcome.php">New Game</a></p>
    </div>
</div>
</body>
</html>