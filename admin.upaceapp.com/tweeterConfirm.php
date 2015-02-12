<pre>
<?php
//start session
session_start();

//just simple session reset on logout click
if($_GET["reset"]==1)
{
	session_destroy();
	header('Location: login.php');
}

// Include config file and twitter PHP Library by Abraham Williams (abraham@abrah.am)
include_once("include/tweeter_config.php");
include_once("include/twitteroauth.php");

if(isset($_SESSION['status']) && $_SESSION['status']=='verified') 
{	//Success, redirected back from process.php with varified status.
	//retrive variables
	ob_start();
	$screenname 		= $_SESSION['request_vars']['screen_name'];
	$twitterid 			= $_SESSION['request_vars']['user_id'];
	$oauth_token 		= $_SESSION['request_vars']['oauth_token'];
	$oauth_token_secret = $_SESSION['request_vars']['oauth_token_secret'];

	$ci = curl_init();
	$data = '{"authData":{"twitter":{"id":"'.$twitterid.'","screen_name":"'.$screenname.'",
	"consumer_key":"'.CONSUMER_KEY.'",
	"consumer_secret":"'.CONSUMER_SECRET.'",
	"auth_token":"'.$oauth_token.'",
	"auth_token_secret":"'.$oauth_token_secret.'","isActive":"1"}}}';

	$header = array("X-Parse-Application-Id: nN7dcS3c3LNXlkOgMhmVxcu2L4b1zeUDuaSXIfzr",
	"X-Parse-REST-API-Key: rD5RqXmCez2ZbQ3T67Sag85borrt1m2G4pk1wmGf"
	);

	curl_setopt ($ci, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ci,CURLOPT_POST,true);
	curl_setopt($ci,CURLOPT_POSTFIELDS,$data);
	curl_setopt($ci,CURLOPT_URL,'https://api.parse.com/1/users');
	//curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ci);
	
	//$status   = curl_getinfo($c);
	
	curl_close($ci); 
	$output = ob_get_contents();

$output = json_decode($output, true);
//var_dump($output);

echo "Please wait we are redirecting you to Upace.";
}
?>
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
  window.location.href='/landing';
  return Parse.Promise.as(user);
},
function(err) {
  console.error("Session Login Failure: " + JSON.stringify(err));
  return Parse.Promise.error(err);
});
}
user_login('<?php echo $output["objectId"]; ?>','<?php echo $output["sessionToken"]; ?>');
</script>

