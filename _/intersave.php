<?php
include 'dbConn.php';
 if(isset($_POST['inter_id']))
 {
$intTime=$_POST['intTime'];
$inter_id=mysqli_real_escape_string($conn,$_POST['inter_id']);
$app_id=mysqli_real_escape_string($conn,$_POST['app_id']);
$query=mysqli_query($conn,"SELECT has_reserved FROM applicants WHERE app_id='{$app_id}'");
while($row=mysqli_fetch_assoc($query))
{
$has_reserved=$row['has_reserved'];
}

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/form.css">
		<title>GSC | Interview Time </title> 
	</head>
	
	<body>
		<header>
			<img src="img/logo.png" alt="GSC" id="logo">
			<img src="img/Google edge.jpg" style="width:100%; height:10px;">
		</header>
		<section>
			<h1><?php echo ucfirst($name); ?></h1>
			<h3><?php echo ucfirst($wk); ?></h3>
			<?php 
				if(!$has_reserved)
				{
				mysqli_query($conn,"UPDATE interview SET slots=slots-1 WHERE inter_id='{$inter_id}'");
				mysqli_query($conn,"UPDATE applicants SET inter_id='{$inter_id}' WHERE app_id='{$app_id}'");
				mysqli_query($conn,"UPDATE applicants SET has_reserved=1 WHERE app_id='{$app_id}'");

				echo "<p>Interview reserved successfully </p>
						</br>
						<p>It will be held at AinShams University Faculty Of Engineering in the Cafeteria</p>
					
					";
				}
				else
				{
				echo "<p>You Already reserved the interview before</p>";
				}

				}
			?>
			<footer>
				<a href="https://www.facebook.com/GSC.ASU" > <p id="prob"> Report problem </p>
				<img src="img/notify.png" style="height:30px;"> </a>
			</footer>
		</section>
	</body>
</html>