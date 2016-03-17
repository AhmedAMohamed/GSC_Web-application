<?php
require 'dbConn.php' ;



// subject
$subject = 'GSC | Ad Class Interview';



// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$headers .= 'From: Interview <info@gsc-asu.com>' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Mail it






// $sql="UPDATE  `interview` SET `slots`= 3 WHERE workshop = 'Android'";
					
					
			 // $result = $conn->query($sql);
			 // if (!$result)
			 // {
				 // die($conn->connect_error);
				
			 // }		




//  setting dates to db
$slots=3;
$workshop="Ad Class";
$intervals=array("10:00","10:30","11:00","11:30","12:00","12:30","01:00","01:30","02:00","02:30","03:00","03:30","04:00");
?>
 <?php for($i=3;$i<=3;$i++): ?>
<?php $day=date("D M j o",mktime(0,0,0, date("m"),date("d")+$i,date("Y")));?>
<?php  for($j=0;$j<=11;$j++): ?>
<?php

			 // $Date=$day ." ".$intervals[$j]."-".$intervals[$j+1];
			 // echo $Date."</br>";
			 // $sql="INSERT INTO `interview` (`date`, `slots`, `workshop`) VALUES ('$Date', '$slots','$workshop')";
					
					
			 // $result = $conn->query($sql);
			 // if (!$result)
			 // {
				 // die($conn->connect_error);
				
			 // }				
		  ?>
	
	
	
	
	
	
	
		<!--<h6><?php //echo $day ." ".$intervals[$j]."-".$intervals[$j+1]; ?></h6>-->
	<?php endfor; ?>
<?php endfor; ?>










						
<?php
//// setting passed =1 for gd	
// $update="UPDATE `applicants` SET passed=1 WHERE workshop = 'Game Development';";
// $result=mysqli_query($conn,$update);
// if($result){echo "Done";}
// else{die(mysqli_error($conn));}
































$x=0;
$emails="SELECT * FROM `applicants` WHERE workshop='Ad Class' AND passed=1 ; ";
$Allemails=mysqli_query($conn,$emails);

	if (!$Allemails)
	{
		die(mysqli_error($conn));
	}					
	else
	{
		// var_dump($result);
		while($row=mysqli_fetch_array($Allemails))
		{
			$mail=$row['mail'];
			//echo $mail." ".$row['app_id'] ."</br>";
			
			
			
			$to =$mail ;
			
			// message
			$message = '
			<html>
			<head>
			  <title> GSC | Interviews </title>
			</head>
			<body>
			  
			  <p>Dear '.$row['name'].'</p></br>
			  <p>you have applied for '.$row['workshop'].' workshop, it is time for interview phase</p>
			   <h3>Choose Your Interview Time & Date From <a href="http://gsc-asu.com/interviews.php?app_id='.$row['app_id'].'">Here</a></h3>
			</body>
			</html>
			';
			// echo ++$x." ".$mail."</br>";
			
			if(mail($to, $subject, $message, $headers))
			{
				echo ++$x." ".$mail."</br>";
			}
			
		}
		mail("ahmedbassell@gmail.com", $subject, $message, $headers);
	}





































?>