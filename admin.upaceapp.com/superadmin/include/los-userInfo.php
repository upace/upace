<script>
/*Parse.initialize("nN7dcS3c3LNXlkOgMhmVxcu2L4b1zeUDuaSXIfzr", "thCEUZ2AV4ShhzGlQpxYucpLI0uwj7JNBizIrThe");
var currentUser = Parse.User.current();
if (currentUser) {
     var University = Parse.Object.extend("university");
	var q = new Parse.Query(University);
	q.equalTo("users",currentUser);
	q.first({
	  success: function(results){
	      var university = results;
		 console.log(university.get("name"));
		 $('#shwUniversity').html("Super-Admin Panel")
	  }
	});
} else {
    window.location = 'login' ;
}*/

Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
var currentUser = Parse.User.current();
if (currentUser) 
{
     //console.log(currentUser);alert(currentUser.get('email'));
     if(currentUser.get('isActive')==1 && currentUser.get('userType')=='superadmin')
     {
     }
     else{
     	Parse.User.logOut();
		window.location = 'login' ;
     }
} else {
    window.location = 'login' ;
}
</script>

<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					
					
					<a href="javascript:void(0);" >
						 
						<span id="shwUniversity">
							Super-Admin Panel
						</span>
						<!--<i class="fa fa-angle-down"></i>-->
					</a> 
					
				</span>
			</div>
