<?php ?>
<script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.2.12.min.js"></script>	
<script>
function add_university(data)
{
var sendMail=0;

var values = {};

    $.each(data, function (i, field) {
        values[field.name] = field.value;
    });

    var getValue = function (valueName) {
        return values[valueName];
    };

    var firstname = getValue("firstname");
    var lastname = getValue("lastname");
    var email = getValue("email");
    var username = getValue("email");
    var password = '123456789';
    var university = getValue("university");
    
    //alert(firstname);
    
				Parse.initialize("nN7dcS3c3LNXlkOgMhmVxcu2L4b1zeUDuaSXIfzr", "thCEUZ2AV4ShhzGlQpxYucpLI0uwj7JNBizIrThe");
					
				var user = new Parse.User();
				user.set("lastname", lastname);
				user.set("firstname", firstname);
				user.set("email", email);
				user.set("username", username);
				user.set("password", password);
						 
				user.signUp(null, {
					 success: function(user) {
					    // Everything's done!
						console.log(user.id);
						
						var University = Parse.Object.extend("university");
						var b1 = new University({"name":university,"users":user});
						b1.save(null, {
						    success:function(b1){
							  var sendMail = 1;
							  
							   $.ajax({
								  url : "ajax.php",
								  type: "POST",
								  data : { method: 'send_mail_verification', firstName: firstname, Email: email,userId: user.id },
								  success: function(data1)
								  {
									if(data1){
									  //alert("successfully saved");
									  $('.result-msg').html('<div style="padding: 20px;border: 1px solid green;background: #eee;color:green">Successfully saved.</div>');
									  document.getElementById('Submit').style.pointerEvents = 'none';
		    								document.getElementById('Submit').style.opacity = '0.50';
									}else{
									  // alert("Not successfully saved");
									   $('.result-msg').html('<div style="padding: 20px;border: 1px solid red;background: #eee;color:red">Sorry Not saved Successfully. Please Try again.</div>');
									  document.getElementById('Submit').style.pointerEvents = 'none';
		    								document.getElementById('Submit').style.opacity = '0.50';
									}
								   
								  }
							   });
							  
						    },
						    error:function(b1,error){
							   console.log(error.message);
							   var sendMail = 0;
						    }
						});
					},
					error: function(user, error) {
						//alert("Error: " + error.code + " " + error.message);
						$('.result-msg').html('<div style="padding: 20px;border: 1px solid red;background: #eee;color:red">'+error.message+'</div>');
					}
					
					
				});
				
					if(sendMail == 1)
					{
						
					}	
}				
</script>
<?php

?>
