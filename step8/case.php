<?php
require 'lib/site.inc.php';
$view = new Felis\CaseView($site, $_GET);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php echo $view->head(); ?>
</head>

<body>
<div class="case">
<?php echo $view->header();
echo $view->project();
echo $view->footer();
?>

</div>

</body>
</html>
