<?php
	$pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
define('ROOT', $pageURL.$_SERVER['HTTP_HOST'].'/');

if(!empty($_POST))
{
	if($_POST['method'] == 'send_mail_verification')
	{
	     $to = $_POST['Email']; // this is your Email address
	    $from = 'no-reply@uparse.com'; // this is the sender's Email address
	    $firstName = $_POST['firstName'];
	     $userId = $_POST['userId'];
	    
	    $link = ROOT.'gym/registerStaff?uid='.base64_encode($userId)."&d=".strtotime(date('Y-m-d H:i:s'))."&t=".md5($_POST['type']);
	    $subject = "Create your account";
	    $message = "Hi ".$first_name . ", <br/><br/> Please click the Link below to create your account." . "<br/>" . $link ."<br/><br/>"."Thanks,<br/> Upace";
	    

	    $headers  = 'MIME-Version: 1.0' . "\r\n";
	    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	    $headers .= "From:" . $from. "\r\n";
	   	
	    mail($to,$subject,$message,$headers);
	   echo 1; exit;
	}
	
	
	if($_POST['method'] == 'send_mail_verification_for_staff')
	{
	     $to = $_POST['Email']; // this is your Email address
	    $from = 'no-reply@uparse.com'; // this is the sender's Email address
	    $firstName = $_POST['firstName'];
	     $userId = $_POST['userId'];
	    $gymname = $_POST['gym'];
	    $link = ROOT.'gym/registerStaff?uid='.base64_encode($userId)."&d=".strtotime(date('Y-m-d H:i:s'))."&t=".md5($_POST['type']);
	    $subject = "Create your account";
	    $message = "Hi ".$first_name . ", <br/><br/> Please click the Link below to create your account for Gym : <b>".$gymname."</b>." . "<br/>" . $link ."<br/><br/>"."Thanks,<br/> Upace";
	    

	    $headers  = 'MIME-Version: 1.0' . "\r\n";
	    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	    $headers .= "From:" . $from. "\r\n";
	   	
	    mail($to,$subject,$message,$headers);
	   echo 1; exit;
	}
}
?>
