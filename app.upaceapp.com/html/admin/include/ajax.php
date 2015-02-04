<?php
	
if(!empty($_POST))
{
	if($_POST['method'] == 'send_mail_verification')
	{
	     $to = $_POST['Email']; // this is your Email address
	    $from = 'no-reply@uparse.com'; // this is the sender's Email address
	    $firstName = $_POST['firstName'];
	     $userId = $_POST['userId'];
	    
	    $link = 'http://server3-upace.vm-host.net/gym/register.php?uid='.base64_encode($userId)."&d=".strtotime(date('Y-m-d H:i:s'));
	    $subject = "Create your account";
	    $message = "Hi ".$first_name . ", <br/><br/> Please click the Link below to create your account." . "<br/>" . $link ."<br/><br/>"."Thanks,<br/> Upace";
	    

	    $headers  = 'MIME-Version: 1.0' . "\r\n";
	    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	    $headers .= "From:" . $from. "\r\n";
	   	
	    mail($to,$subject,$message,$headers);
	   echo 1; exit;
	}
}
?>
