<?php
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
define('ROOT', $pageURL.$_SERVER['HTTP_HOST'].'/');

define('GYMROOT', $pageURL.$_SERVER['HTTP_HOST'].'/admin/');

define('SITENAME' , 'uPace');
define('API', 'nN7dcS3c3LNXlkOgMhmVxcu2L4b1zeUDuaSXIfzr');
define('JSKEY', 'thCEUZ2AV4ShhzGlQpxYucpLI0uwj7JNBizIrThe');
?>
