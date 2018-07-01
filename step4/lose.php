<?php
require 'format.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loser</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php echo present_header("Stalking the Wumpus"); ?>

<div class="main">
    <figure>
        <img src="wumpus-wins.jpg" height="325" width="600" alt="Image of Live Wumpus">
    </figure>
    <div class="status">
        <p>You Died and the Wumpus ate your brain!</p>
    </div>

    <div class="links">
        <p><a href="welcome.php">New Game</a></p>
    </div>
</div>
</body>
</html>