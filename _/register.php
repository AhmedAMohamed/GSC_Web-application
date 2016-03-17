<?php
function test_input($data)
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
require 'dbConn.php' ;


if (isset($_POST['submit'])) 
{

	$name = test_input($_POST['name']);
	$email = test_input($_POST['mail']);
	$phone = test_input($_POST['phone']);
	$college = test_input($_POST['College']);
	$year = test_input($_POST['Year']);
	$workshop = test_input($_POST['Workshop']);
	$pst_enc_id = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
	
	
	//from here
	$checkQ="SELECT COUNT(mail) FROM `applicants` WHERE mail = '".$email."'; ";
	$checkEx=mysqli_query($conn,$checkQ);
	$checkMail = mysqli_fetch_row($checkEx);
	$countMail=$checkMail[0];
	if($countMail>0)
	{
		header("Location:Registertion.php?done=0");
		exit();
	}
	//to here
	
	
	
	$sql="INSERT INTO `applicants`(`name`, `mail`, `phone`, `workshop`, `college` ,`year`,`app_id`) VALUES
					('$name', '$email','$phone','$workshop','$college' ,'$year','$pst_enc_id')";
					
					
	$result = $conn->query($sql);
	if (!$result)
	{
		die($conn->connect_error);
		
	}					
	else
	{
		//Mailling
		$to = $email;
		if($workshop!="Game Development")
		{
			$subject = "GSC : PST link";
			$message = "
			<html>
			<body>
			<p>Dear , ". $name .". You chose ".$workshop." Workshop </p>
			<p><a href='http://gsc-asu.com/begin.php?code=".$pst_enc_id."'>Click to go to PST</a>
			</body>
			</html>
			";

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: <GSC@gsc-asu.com>' . "\r\n";

		}
		else
		{
			$subject = "GSC : Application sent";
			$message = "
			<html>
			<body>
			<p>Dear , ". $name .". You chose ".$workshop." Workshop </p>
			<p>Thnk you for applying for our workshops</p>
			</body>
			</html>
			";

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: <GSC@gsc-asu.com>' . "\r\n";

		}
		mail($to,$subject,$message,$headers);
		header("Location:Registertion.php?done=1");
		exit();
	} 
}
else
{
	header("Location:Registertion.php?warning");
}

?>
 <!DOCTYPE html>
 <html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<title>Registration</title>
<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<div id="logo">
<img src="logo.png">
</div>

<div id="bar" width="310px" height="100%">
	<p>GSC | Registration</p>
</div>

	
<center>
	Thanks , <?= $_POST['name'] ?>
</center>

	</body>
 </html>

