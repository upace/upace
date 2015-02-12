<?php require_once('include/config.php');?>
<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>
	<?php require_once('include/header.php');
         ?>
       <!--<META http-equiv="refresh" content="2;URL=<?php echo ROOT; ?>login">-->
</head>

<body style="background-color: #000">
	<section class="spalsh">
    <!-- Page Content -->
    <div class="container">
		<br />
        <div class="landing col-md-6 col-sm-12">
        	<h1>LOGO</h1>
            <h2>You're in control.<br>
				Workout at your own pace.</h2>
        	<div class="login-pg">
			<!--<div class="social-btn">
			<div class="facebook"><a href="<?php echo ROOT; ?>admin/login" class="btn btn-info btn-lg">UNIVERSITY ADMIN</a></div>
			<div class="facebook" style="float:right"><a href="<?php echo ROOT; ?>gym/login" class="btn btn-info btn-lg">GYM ADMIN</a></div>
			</div>
			</div>-->
			
			<div class="row">
				<div class="col-sm-6 bttn-mb">
					<center><a href="<?php echo ROOT; ?>admin/login" class="btn btn-info btn-lg bttn">UNIVERSITY ADMIN</a></center>
				</div>
				<div class="col-sm-6">
					<center><a href="<?php echo ROOT; ?>gym/login" class="btn btn-info btn-lg bttn">GYM ADMIN</a></center>
				</div>
			</div>
        </div>
    </div>
    
    <!-- /.container -->
    </section>
	
    <!-- jQuery include Start -->
    	<?php require_once('include/footer.php');?>
    <!--Inclued jquery End --->
		<?php if(isset($_REQUEST['broken']) && $_REQUEST['broken']=='true')
		{
			echo "<script type='text/javascript'>showError('Sorry Invalid Link.');</script>";
		}
		if(isset($_REQUEST['login']) && $_REQUEST['login']=='true')
		{
			echo "<script type='text/javascript'>showSuccess('Your account activated. You can Now login.');</script>";
		}
		?>
		
</body>
<style>
label{display:block;}
.login-pg .social-btn .facebook{opactity:0.8;}
.login-pg .social-btn .facebook input.button{background:#5d9fa9;opacity:0.8 !important;}

@media only screen and (min-width: 320px) and (max-width: 480px){
	.login-pg .social-btn .twitter input.button, .login-pg .social-btn .facebook input.button {
 
}
}
.bttn {
	width: 100%;
	font-size: 200%;
	opactity:0.8;
}
@media(max-width: 320px) {
	.bttn {
		width: 100%;
		font-size: 100%;
	}
}
@media(max-width: 768px) {
	.bttn-mb {
		margin-bottom: 20px;
	}
}
</style>
</html>
