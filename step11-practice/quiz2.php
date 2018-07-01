<?php
// Initial values
$now = new DateTime("now");
$month = $now->format("n");
$day = $now->format("j");
$year = $now->format("Y");
if(isset($_GET['month']) && isset($_GET['day']) && isset($_GET['year'])) {
	// We have form parameters
	$month = $_GET['month'];
	$day = $_GET['day'];
    $year = $_GET['year'];
    
    //set cookies
    $expire = time() + (86400 * 365);
    setcookie("month", $month, $expire, "/");
    setcookie("day", $day, $expire, "/");
    setcookie("year", $year, $expire, "/");

} elseif(isset($_COOKIE['month']) && isset($_COOKIE['day']) && isset($_COOKIE['year']) ) {
    $month = $_COOKIE['month'];
    $day = $_COOKIE['day'];
    $year = $_COOKIE['year'];
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Biorhythm</title>
</head>
<body>
<form action="">
	<p><label for="month">Date of Birth:</label><br>
		<select name="month">
			<?php
			$months = array('', 'January', 'February',
				'March', 'April', 'May', 'June', 'July',
				'August', 'September', 'October',
				'November', 'December');

			for($i=1;  $i<=12;  $i++) {
				$s = $i == $month ? " selected" : "";
				$m = $months[$i];
				echo "<option value=\"$i\" $s>$m</option>";
			}
			?>
		</select>
		<select name="day">
			<?php
			for($i=1; $i<=31; $i++) {
				$s = ($i == $day) ? " selected" : "";
				echo "<option value=\"$i\" $s>$i</option>";
			}
			?>
		</select>
		<select name="year">
			<?php
			for($i=1915; $i<=2020; $i++) {
				$s = ($i == $year) ? " selected" : "";
				echo "<option value=\"$i\" $s>$i</option>";
			}
			?>
		</select>
	</p>
	<p><input type="submit"></p>
</form>
<?php
$dt1 = new DateTime();
$dt1->setDate($year, $month, $day);
$days = $now->diff($dt1)->days;

$physical = bio($days, 23);
$emotional = bio($days, 28);
$intellectual = bio($days, 33);

echo <<<HTML
<p>Physical: $physical</p>
<p>Emotional: $emotional</p>
<p>Intellectual: $intellectual</p>
HTML;


function bio($days, $div) {
	$bio = sin(2 * pi() * $days / $div);
	return sprintf("%.2f", $bio);
}
?>
</body>
</html>
