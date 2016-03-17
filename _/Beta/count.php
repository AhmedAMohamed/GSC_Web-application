<?php 
//starting connection
include 'dbConn.php';

$checkans = mysqli_query($conn,"SELECT COUNT(DISTINCT mail) FROM `applicants` WHERE takenquiz = 1") or die("err check if submited0");//check no
$check_rows_ans = mysqli_fetch_row($checkans);
$countAns=$check_rows_ans[0];

$checkWone = mysqli_query($conn,"SELECT COUNT(DISTINCT mail) FROM `applicants` WHERE `workshop`='Android'") or die("err check if submited1");//check no
$check_rowsOne = mysqli_fetch_row($checkWone);
$countWone=$check_rowsOne[0];

$checkWtwo = mysqli_query($conn,"SELECT COUNT(DISTINCT mail) FROM `applicants` WHERE `workshop`='Ad Class'") or die("err check if submited2");//check no
$check_rowsTwo = mysqli_fetch_row($checkWtwo);
$countWTwo=$check_rowsTwo[0];

$checkWThree = mysqli_query($conn,"SELECT COUNT(DISTINCT mail) FROM `applicants` WHERE `workshop`='Game Development'") or die("err check if submited3");//check no
$check_rowsThree = mysqli_fetch_row($checkWThree);
$countWThree=$check_rowsThree[0];

$checkWFour = mysqli_query($conn,"SELECT COUNT(DISTINCT mail) FROM `applicants` WHERE `workshop`='Youtube'") or die("err check if submited4");//check no
$check_rowsFour = mysqli_fetch_row($checkWFour);
$countWFour=$check_rowsFour[0];

// $checkWFive= mysqli_query($con,"SELECT COUNT(DISTINCT mobile) FROM `students` WHERE `workshop`='w5'") or die("err check if submited");//check no
// $check_rowsFive = mysqli_fetch_row($checkWFive);
// $countWFive=$check_rowsFive[0];
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Counter</title>
		<style>
			body{padding:0;background:#427FED;}
			#count{color:white;font-size:50px;font-family: 'Open Sans', sans-serif;margin-top:200px;}
			.counts{color:#427FED;background-color:white;font-size:30px;font-family: 'Open Sans', sans-serif;border:1px solid white;}
		</style>
	</head>
	<body>
		<center>
			<div id="count"><?php echo $countAns; ?></div>
			<table>
				<tr>
					<td>
						<div class="counts">Android Club :</div>
					</td>
					<td>
						<div class="counts"><?php echo $countWone; ?></div>
					</td>
				</tr>
				
				<tr>
					<td>
						<div class="counts">Ad Class:</div>
					</td>
					<td>
						<div class="counts"><?php echo $countWTwo; ?></div>
					</td>
				</tr>
				
				<tr>
					<td>
						<div class="counts">Game Development</div>
					</td>
					<td>
						<div class="counts"><?php echo $countWThree; ?></div>
					</td>
				</tr>
				
				<tr>
					<td>
						<div class="counts">Youtube</div>
					</td>
					<td>
						<div class="counts"><?php echo $countWFour; ?></div>
					</td>
				</tr>
				
				
			</table>
			
			
		</center>
	</body>
</html>