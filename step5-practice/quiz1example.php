<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Quadratic Demo</title>
</head>
<body>
<?php
$quad = new Quadratic(1, 1, -1);
echo $quad->rootsHtml();
$quad = new Quadratic(-1, 0.5, 1);
echo $quad->rootsHtml();
$quad = new Quadratic(1, 0, 10);
echo $quad->rootsHtml();
?>

</body>
</html>

<!-- The roots of x2 + x - 1 are -1.618 and 0.618.

The roots of -x2 + 0.5x + 1 are 1.281 and -0.781.

x2 + 10 has no roots. -->