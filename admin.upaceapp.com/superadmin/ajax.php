<?php
	
if(!empty($_POST))
{
	if($_POST['method'] == 'send_mail_verification')
	{
	
	 $pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	define('ROOT', $pageURL.$_SERVER['HTTP_HOST'].'/');
	
	     $to = $_POST['Email']; // this is your Email address
	    $from = 'no-reply@uparse.com'; // this is the sender's Email address
	    $firstName = $_POST['firstName'];
	     $userId = $_POST['userId'];
	    
	    $link = ROOT.'admin/register?uid='.base64_encode($userId)."&d=".strtotime(date('Y-m-d H:i:s'));
	    $subject = "Create your account";
	    $message = "Hi ".$first_name . ", \n\n Please click the Link below to create your account." . "\n" . $link ."\n\n"."Thanks,\n Upace";
	    

	    $headers  = 'MIME-Version: 1.0' . "\r\n";
	    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	    $headers .= "From:" . $from. "\r\n";
	   	
	    mail($to,$subject,$message,$headers);
	   echo 1; exit;
	}
}
?>
