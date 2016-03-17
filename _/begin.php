<?php
session_start();
session_unset();
session_destroy();
require 'dbConn.php' ;
// require 'includes/functions.php';

header( 'Location:http://gsc-asu.com' ) ;
exit();


$name='';
$enc_id=mysqli_real_escape_string($conn,$_GET['code']);

$sql="SELECT * FROM applicants WHERE app_id = '{$enc_id}' ; ";
					
					
	$result = $conn->query($sql);
	
	if (!$result)
	{
		die("ERROR 123");
	}					
	else
	{
		// var_dump($result);
		while($row=mysqli_fetch_array($result))
		{
			$enc=$row['app_id'];
			$name=$row['name'];
		}
	}
	
	//var_dump($name);
	
?>

<html>
<head>
	<title>GSC | PST </title>
	<link rel="stylesheet" href="css/pst-begin.css">
</head>
<body>
	<!-- <header style="background:white;">
		<img src="img/logo.png" alt="GSC"> 
		<span id="student_name">Student Name </span> 
	</header>
	<header style="background:#4385f6; box-shadow:0px 3px 20px #222; margin-top:0px; " id="ex_head">
		<span id="ex_title"> GSC | Qualification Exam </span>
	</header> -->
	<section>
		<img id="header" src="img/header.jpg" alt="GSC">
		<!-- <img id="logo" src="img/logo.png" alt="GSC"> -->
		<h1>Welcome ... <i><?php echo " ".$name." "; ?></i></h1>
		<h2>Press begin when you are ready<h2>
		<form method="post" action="pst.php">
			<input type="hidden" name="app_id" value="<?php echo $enc; ?>" />
			<input type="hidden" name="student_name" value="<?php echo $name; ?>" />
			<input type="submit" class="submit" value="Begin"/>
		</form>
	</section>
	<footer>
		<a href="https://www.facebook.com/GSC.ASU" target="_blank" > <p id="prob"> Report problem </p>
		<img src="img/notify.png" style="height:30px;"> </a>
	</footer>
</body>
</html>



