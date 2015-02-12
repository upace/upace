<?php require_once('include/config.php');
$dt = date('Y-m-d H:i:s',$_REQUEST['d']);
$nw_dt = date('Y-m-d H:i:s');
$date1 = new DateTime($dt);
$date2 = new DateTime($nw_dt);
$diff = $date2->diff($date1);
$hours = $diff->h;
$hours = $hours + ($diff->days*24);
?>
<script type="text/javascript" src="<?php echo ROOT?>js/parse-1.2.12.min.js"></script>
<?php
if(!isset($_REQUEST['uid']) || empty($_REQUEST['uid']) || $hours>23 || !isset($_REQUEST['d']) || empty($_REQUEST['d']))
{
	header('Location: index.php?broken=true');
}
require_once('include/functions.php');
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
			checkUrl("<?php echo base64_decode($_REQUEST['uid']);?>");
			});
</script>
<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>
	<?php require_once('include/header.php');?>
</head>

<body>
	<section class="login-bg">
    <!-- Page Content -->
    <div class="container">
        
    </div>
    <!-- /.container -->
    </section>
	
    <!-- jQuery include Start -->
    	<?php require_once('include/footer.php');?>
    <!--Inclued jquery End --->
		
		
</body>

</html>
