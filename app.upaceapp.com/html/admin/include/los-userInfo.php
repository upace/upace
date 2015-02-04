<script>
Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
var currentUser = Parse.User.current();
if (currentUser) 
{
     //console.log(currentUser);alert(currentUser.get('email'));
     if(currentUser.get('isActive')==1 && currentUser.get('userType')=='admin')
     {
     	
     	var University = Parse.Object.extend("university");
		var q = new Parse.Query(University);
		q.equalTo("users",currentUser);
		q.first({
		  success: function(results){
			 var univ = results;
			 if(univ)
			 {
			 		console.log(univ.get("name"));
			 		$('#shwUniversity').html(univ.get("name")+" Admin Panel");
			 }
			 else{
			 		Parse.User.logOut();
					window.location = 'login' ;
			 }	
		  }
		});
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
							
						</span>
						
					</a> 
					
				</span>
			</div>
