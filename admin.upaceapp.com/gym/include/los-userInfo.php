<script>
Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");
var currentUser = Parse.User.current();

if (currentUser) {
     var gymIdChk = currentUser.get('universityGymId');
	var type = currentUser.get('userType');
     //console.log(currentUser);
     if(type=='gymadmin' || type=='staff' || type=='manager' || type=='instructor')
     {
     var UniversityGym = Parse.Object.extend("university_gym");
	var q = new Parse.Query(UniversityGym);
	q.equalTo("objectId",gymIdChk);
	q.first({
	  success: function(results){
	      var universitygym = results;
	      //console.log(universitygym);
	      //alert('1');
		 if(universitygym)
		 {
		 	
		 	if(universitygym.get("isActive")==1)
		 	{
		 		//alert('2');
		 		//console.log(universitygym.get("name"));
		 		jQuery('#shwUniversity').html(universitygym.get("name")+" Admin Panel");
		 		
		 	}
		 	else{
		 		//alert('3');
		 		Parse.User.logOut();
		 		window.location = '/gym/login' ;
		 		
		 	}
		 }
		 else{
		 	//alert('4');
		 	Parse.User.logOut();
		 	window.location = '/gym/login' ;
		 	
		 }	
	  }
	});
	
	}
	else
	{
		Parse.User.logOut();
		window.location = '/gym/login' ;
	}
} else {
    //alert('5');
    window.location = '/gym/login' ;
    
}
</script>
<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						 
						<span id="shwUniversity">
							
						</span>
						<!--<i class="fa fa-angle-down"></i>-->
					</a> 
					
				</span>
			</div>
