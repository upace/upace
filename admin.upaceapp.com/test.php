<html>
<head>
<?php require_once('include/config.php');?>
<script type="text/javascript" src="<?php echo ROOT?>js/parse-1.2.12.min.js"></script>	
<script>
Parse.initialize("<?php echo API;?>", "<?php echo JSKEY;?>");

function user_login(userId,parseToken) {
Parse.User.logOut();

// bootstrap Parse into believing there is a current user so that it will pick up the session Token
Parse.User._currentUser = new Parse.User();
Parse.User._currentUser.if = userId; // prob not needed...
Parse.User._currentUser._sessionToken = parseToken;

// now get the actual user so we have easy access to that user's properties
var query = new Parse.Query(Parse.User);
return query.get(userId)
.then(function(user) {
  // save this as the current user so future calls to Parse.User.current() will work properly.
  Parse.User._saveCurrentUser(user);
  console.log("Session Login Successful for " + user.id);
  return Parse.Promise.as(user);
},
function(err) {
  console.error("Session Login Failure: " + JSON.stringify(err));
  return Parse.Promise.error(err);
});
}
var d= user_login('Kh7yupd9Pr','rXtLPu9yL9OivlkiNnvGfszxA');
cut = Parse.User.current();
console.log(cut);


</script>
    <script type="text/javascript">   
   

    </script>  
</head>
<body>
<pre>
<?php
/*
$ci = curl_init();
$data = '{"authData":{"twitter":{"id":"sadas","screen_name":"cat",
"consumer_key":"fdgdg",
"consumer_secret":"dfgdfg",
"auth_token":"dgdfgdfg",
"auth_token_secret":"dfgdfg"}}}';

$header = array("X-Parse-Application-Id: nN7dcS3c3LNXlkOgMhmVxcu2L4b1zeUDuaSXIfzr",
"X-Parse-REST-API-Key: rD5RqXmCez2ZbQ3T67Sag85borrt1m2G4pk1wmGf",
"Content-Type: application/json"
);
curl_setopt ($ci, CURLOPT_HTTPHEADER, $header);
curl_setopt($ci,CURLOPT_POST,true);
curl_setopt($ci,CURLOPT_POSTFIELDS,$data);
curl_setopt($ci,CURLOPT_URL,'https://api.parse.com/1/users');
curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
 $response = curl_exec($ci);
var_dump($response);    
//print_r(curl_getinfo())
curl_close($ci); */
?>
This is a test page.
</body>
</html>
