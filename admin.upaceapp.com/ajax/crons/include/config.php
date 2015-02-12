
<?php
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
//define('ROOT', $pageURL.$_SERVER['HTTP_HOST'].'/');
define('ROOT', 'http://server3-upace.vm-host.net/');
define('SITENAME' , 'uPace');
define('API', 'nN7dcS3c3LNXlkOgMhmVxcu2L4b1zeUDuaSXIfzr');
define('REST_API', 'rD5RqXmCez2ZbQ3T67Sag85borrt1m2G4pk1wmGf');
define('MASTER_KEY', 'iQTtB6OeotyyKWP29H3zpf1uL8DYlzkSHLconPtt');
define('JSKEY', 'thCEUZ2AV4ShhzGlQpxYucpLI0uwj7JNBizIrThe');

date_default_timezone_set("Asia/Calcutta");
?>

