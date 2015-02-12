<?php require_once('include/config.php');?>
<script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.2.12.min.js"></script>
<script>

	Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
	Parse.User.logOut()
			window.location = '/login';
	

</script>
