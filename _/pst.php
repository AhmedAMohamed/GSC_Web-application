<?php
session_start();
session_unset();
session_destroy();

session_start();
include 'dbConn.php';

header( 'Location:http://gsc-asu.com' ) ;
exit();
///BAssl Timer 

if (isset($_SESSION["tdsg"]) && isset($_SESSION["USER"])) {
    // session variable_exists, use that
    $targetDate = $_SESSION["SJNE9FsLu0"];
	// if(isset($_POST['app_id']))
	// {
		// $app_id=$_POST['app_id'];
		// if($app_id==$_SESSION["USER"])
		// {
			// header('Location: alreadytaken.html');
		// }
	// }
	//echo "session exist";
} else {
    // No session variable, red from mysql
    //$result=mysql_query("select * from test where testid='29' LIMIT 1");
    //$time=mysql_fetch_array($result);
    $dateFormat = "d F Y -- g:i a";
    $targetDate = time() + (60*30);
    $_SESSION["tdsg"] = $targetDate;
	//echo $_SESSION["tdsg"];
	if(isset($_POST['app_id']))
	{
		$app_id=$_POST['app_id'];
		$_SESSION["USER"]=$app_id;
	}
}
session_write_close();
$actualDate = time();
$secondsDiff = $targetDate - $actualDate;
$remainingDay     = floor($secondsDiff/60/60/24);
$remainingHour    = floor(($secondsDiff-($remainingDay*60*60*24))/60/60);
$remainingMinutes = floor(($secondsDiff-($remainingDay*60*60*24)-         ($remainingHour*60*60))/60);
$remainingSeconds = floor(($secondsDiff-($remainingDay*60*60*24)-    ($remainingHour*60*60))-($remainingMinutes*60));
//$actualDateDisplay = date($dateFormat,$actualDate);
//$targetDateDisplay = date($dateFormat,$targetDate);
if( $targetDate <= $actualDate)
	{
		//header( 'Location:none.php' ) ;
	}



// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 if(isset($_POST['app_id']))
 {
	$app_id=$_POST['app_id'];
	$studentName=$_POST['student_name'];
	$query=mysqli_query($conn,"SELECT * FROM `applicants` WHERE app_id='$app_id'") or die(mysqli_error($conn));
	while ($row=mysqli_fetch_assoc($query))
	{

	$istaken=$row['takenquiz'];
	$workshop=$row['workshop'];
	}
	if($istaken==1 || ($targetDate-$actualDate) <=0)
	{
		header('Location: alreadytaken.html');
	}

	else{
	$query=mysqli_query($conn,"UPDATE `applicants` SET takenquiz=1 WHERE app_id='$app_id'") or die(mysqli_error($conn));
	}
}

else{
header('Location: noid.html');

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewpoint" content="width=device-width; initial-scale=1">
	<title>GSC | PST </title>
	<link rel="stylesheet" href="css/pst.css">
	<!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

	<!-- Optional theme -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->  
</head>

<body class="container-fluid">
	<div class="row">
		<header style="background:white;">
			<!-- <div class="col-md-6"> --> <img src="img/logo.png" alt="GSC"> 
			<!-- <div class="col-md-6"> --> <span id="student_name"><?php echo $studentName; ?></span> 
		</header>
	</div>
	<header style="background:#4385f6; box-shadow:0px 3px 20px #222; margin-top:0px; " id="ex_head">
		<span id="ex_title"> GSC | Qualification Exam </span>

		<div id="time">	 
	 
			<div id="hours"><?php echo $remainingHour; ?></div>
			<div id="minutes"><?php echo $remainingMinutes; ?></div>
			<div id="seconds"><?php echo $remainingSeconds; ?></div>

			</div>
	 </div>


	</header>
	

	<section>
		<center>
		<form role="form" action="quizrec.php" method="post" id="form">
		
<input type="hidden" name="id" value="<?= $app_id?>" />

			<div class="form-group">
<?php
$query1=mysqli_query($conn,"SELECT * FROM mcq WHERE workshop_id = '{$workshop}' ORDER BY RAND()  LIMIT 5 ") or die(mysqli_error($conn));
$colors = array("1"=>"green", "2"=>"red", "3"=>"yellow", "4"=>"blue");
$colsel=1;
$visqn=1;

while ($row=mysqli_fetch_assoc($query1))
{

if ($colsel==5)
{
$colsel=1;
}

			echo	'<div class="container question">',
					'<h1 class="'.$colors[$colsel].' h1">0'.$visqn.' </h1>',
					'<div class="qstyle">',
						'<p>'.$row['mcq_q'].'</p>';
					if(!empty($row['A']))	{echo '<input type="radio" name="'.$row['mcq_id'].'" value="A">'.$row['A'].'<br>';}
					if(!empty($row['B']))	{echo '<input type="radio" name="'.$row['mcq_id'].'" value="B">'.$row['B'].'<br>';}
					if(!empty($row['C']))	{echo '<input type="radio" name="'.$row['mcq_id'].'" value="C">'.$row['C'].'<br>';}
					if(!empty($row['D']))	{echo '<input type="radio" name="'.$row['mcq_id'].'" value="D">'.$row['D'].'<br>';}
				echo	'</div>',
				'</div>' ;
				
				$colsel++;
				$visqn++;
}
$pastie='';
if($workshop=="Android")
{
$ran=rand(1, 3);
$query2=mysqli_query($conn,"SELECT * FROM questions WHERE workshop_id = '{$workshop}' AND module = '{$ran}' ;") or die(mysqli_error($conn));
$pastie="<a href='http://pastie.org/' target='_blank'> put your code here </a>";
}
else
{
$query2=mysqli_query($conn,"SELECT * FROM questions WHERE workshop_id = '{$workshop}' ORDER BY RAND()  LIMIT 5") or die(mysqli_error($conn));
}

while ($row=mysqli_fetch_assoc($query2))
{

if ($colsel==5)
{
$colsel=1;
}	

			echo '<div class="container question">';
			if ($visqn<=9){
				echo '<h1 class="'.$colors[$colsel].' h1">0'.$visqn.' </h1>';
					}
					else
					{
		   echo  '<h1 class="'.$colors[$colsel].' h1">'.$visqn.' </h1>'  ;
					}
				echo	'<div class="qstyle">',
						'<p>'.$row['question'].$pastie.'</p>',
						'<textarea cols="50" type="text" name="q'.$row['q_id'].'"></textarea>',
					'</div>',
				'</div>' ;
				
				$colsel++;
				$visqn++;
}
				
?>

				<input type="submit" class="submit" value="Finish">
			</div>
		</form>
		</center>
	</section> 
	

	<footer>
		<a href ="https://www.facebook.com/GSC.ASU" target="_blank" > <p id="prob"> Report problem </p>
		<img src="img/notify.png" style="height:30px;"> </a>
	</footer>
	
<script src="js/jquery.js"></script>
	<script type="text/JavaScript">
			
			window.onload=startTime;
			$(document).ready(function()
			{
				// $("#sub").hover(function(){
				// $(this).fadeTo(250,1);
				// });
				// $("#sub").mouseleave(function(){
				// $(this).fadeTo(250,0.5);
				// });
			});
			var target_Date=<?php echo $targetDate; ?>;
			var actual_Date=<?php echo $actualDate; ?>;
			var days=[31,28,31,30,31,30,31,31,30,31,30,31];
			
			function startTime()
			{
				var today=new Date(actual_Date*1000);
				var d=today.getDate();
				var h=today.getHours();
				var m=today.getMinutes();
				var s=today.getSeconds();
				
				var fin=new Date(target_Date*1000);
				var da=fin.getDate();
				var ho=fin.getHours();
				var mi=fin.getMinutes();
				var se=fin.getSeconds();

				var hour_left=ho-h;
				var minute_left=mi-m;
				var second_left=se-s;

				if(second_left<0)
				{
					second_left=second_left+60;
					minute_left=minute_left-1;
				}
				if(minute_left<0)
				{
					minute_left=minute_left+60;
					hour_left=hour_left-1;
				}
				if(hour_left<0)
				{
					
					document.getElementById("form").submit();	
					//window.location.replace("none.php");
				}
				else
				{
					t=setTimeout(function(){startTime()},1000);

				}

				hour_left=checkTime(hour_left);
				minute_left=checkTime(minute_left);
				second_left=checkTime(second_left);

				document.getElementById('hours').innerHTML=hour_left+":"
				document.getElementById('minutes').innerHTML=minute_left+":";
				document.getElementById('seconds').innerHTML=second_left;
				


				////AJAX
				// var xhr=false;

				// if (window.XMLHttpRequest) 
					// {
						// xhr = new XMLHttpRequest();
					// }
					// else 
					// {
						// if (window.ActiveXObject) 
						// {
							// try {
								// xhr = new ActiveXObject("Microsoft.XMLHTTP");
								// }
							// catch (e) { }
						// }
					// }	
				// if (xhr)
					// {
						
						// xhr.onreadystatechange = show;
						
							
							
							// xhr.open("GET", "include/Proccessing_time.php", true);
							// xhr.send();
						
						
					// }
					// else 
					// {
						// alert("Sorry, but I couldn't create an XMLHttpRequest");
					// }

					// function show()
					// {
						// if (xhr.readyState == 4) 
						// {
							// if (xhr.status == 200) 
							// {
								// var outMsg = xhr.responseText;
					
							// }
							// else
							// {
								// var outMsg = "There was a problem with the request " + xhr.status;
							// }

						/////Do something here with outMsg
						// actual_Date=parseFloat(outMsg);
						
						// }
					// }
				var seconds_Diff=target_Date-actual_Date;
				if( seconds_Diff == 0)
					{						
						
						document.getElementById("form").submit();		
						//window.location.replace("none.php");	
					}
				 actual_Date++;
				// timeLenght=100-((target_Date-actual_Date)/(30*60/100));
				
				// }
			}

			function checkTime(i)
			{
			if (i<10)
			  {
			  i="0" + i;
			  }
			return i;
			}
			function addrestdays(m,d,n)
			{
				if (m>0)
				{
					n++;
					d=d+days[n];
					m=m-1;
					return addrestdays(m,d,n);
				}
				else
				{
					return d;
				}
			}



</script>

</body>
</html>