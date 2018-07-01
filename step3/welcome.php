<?php
require 'format.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php echo present_header("Stalking the Wumpus"); ?>
<div class="main">
    <figure>
        <img src="cave-evil-cat.png" width="600" height="325" alt="Cat with fangs and blood">
    </figure>
    <div class="status">
        <p>Welcome to <span class="emphasis">Stalking the Wumpus</span></p>
    </div>
    <div class="links">
        <p><a href="instructions.php">Instructions</a></p>
        <p><a href="game.php">Start Game</a></p>
    </div>
</div>
</body>
</html>