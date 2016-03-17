<?php
session_start();
session_unset();
session_destroy();
include 'dbConn.php';
include 'includes/functions.php';


$app_id=$_POST['id'];
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 $score=0;

foreach ($_POST as $param_name => $param_val) 
{
	if(is_numeric($param_name))
	{
		//echo "Param: $param_name; Value: $param_val<br />\n";
		mysqli_query($conn,"INSERT INTO mcqans (answer,app_id,mcq_id) 
		VALUES ('$param_val','$app_id','$param_name')") or die("ERROR 122");

		$query=mysqli_query($conn,"SELECT * FROM `mcq` where mcq_id=".$param_name." ")or die("ERROR 111");

		while($row = mysqli_fetch_assoc($query))
		{
			if($row['right_answer']==$param_val)
			{
				$score++;
			}
			elseif($row['one_point']==$param_val)
			{
				$score+=1;
			}
			elseif($row['two_points']==$param_val)
			{
				$score+=2;
			}
			elseif($row['three_points']==$param_val)
			{
				$score+=3;
			}
			elseif($row['four_points']==$param_val)
			{
				$score+=4;
			}
			elseif($row['five_points']==$param_val)
			{
				$score+=5;
			}

		}
	
	}
	else if ($param_name[0]=='q')
	{
		//echo $app_id."</br>";
		$str = substr($param_name, 1);
		mysqli_query($conn,"INSERT INTO `answers`(`answer`, `app_id`, `q_id`) VALUES ('".mysql_prep($param_val)."','{$app_id}','".$str."')") or die("ERROR 123");

	}
}
//echo "score ".$score;
mysqli_query($conn,"UPDATE applicants SET mcqscore=$score WHERE app_id='{$app_id}'") or die("ERROR 134");

//echo "done"; 


?>

<html>
	<head>
	<title>GSC | PST </title>
	<link rel="stylesheet" href="css/pst-quizrec.css">
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
		<h1>Your answers are submitted</h1>
	</section>
	<footer>
		<a href ="https://www.facebook.com/GSC.ASU"> <p id="prob"> Report problem </p>
		<img src="img/notify.png" style="height:30px;"> </a>
	</footer>
</body>
</html>