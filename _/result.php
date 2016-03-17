<html>
  
  <head>
    <meta charset="utf-8">
    <title>Google Student Club | Ain Shams University - Results</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"
    rel="stylesheet">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
<?php

include 'dbConn.php';
?>
<table class="table table-hover">
<?php

if (isset($_GET['wk'])) {
	$wk = $_GET['wk'];
	if ($wk == "android") {
		$workshop = "Android";
	}
	elseif ($wk == "adclass") {
		$workshop = "Ad Class";
	}elseif ($wk == "youtube") {
		$workshop = "Youtube";
	}else{
		echo "Wrong Way!";
		exit();
	}
}else{
		echo "Wrong Way!";
		exit();
	}
if (!isset($_GET['page'])) {
		echo "<h1>Please Mr PO check the url if page number is correct or Ask Web Captains where their mothership</h1>";
		exit();
	}
$pageNum = $_GET['page'];
if ($pageNum <= 0) {
	$offset = 0;
}else{
	$offset = $pageNum * 5;
}
echo "Results page " .$pageNum." for " .$workshop. " Workshop .....if you don't know about how you use it please call Problem Solving committe";
if($_POST){
	$app_id_ = $_POST['app_id'];
	$score_ = $_POST['score'];
	$q_id_ = $_POST['q_id'];
	//$sql_="INSERT INTO `resultsq`(`app_id`, `score`, `q_id`) VALUES('$app_id_', $score_, $q_id_) ON DUPLICATE KEY UPDATE    
	//score=VALUES(score)";
	$sql_ = "UPDATE `resultsq` SET `score`=$score_ WHERE `q_id`=$q_id_  AND `app_id`='$app_id_'  ";
	$result_= $conn->query($sql_); 
	if(mysqli_affected_rows($conn)){
		echo "<script>alert('UPDATED')</script>";
	}else{
		$sql__="DELETE FROM `resultsq` WHERE `q_id`=$q_id_  AND `app_id`='$app_id_' AND score = $score_ ";
		$result_= $conn->query($sql__); 
		$sql__="INSERT INTO `resultsq`(`app_id`, `score`, `q_id`) VALUES('$app_id_', $score_, $q_id_) ";
		$result__= $conn->query($sql__); 
		if ($result__) {
			echo "<script>alert('DONE')</script>";
		}
	}
}

$sql="SELECT * FROM `applicants` WHERE  workshop = '$workshop' AND takenquiz = 1 LIMIT 5 OFFSET $offset";
	$result = $conn->query($sql); 
	if(mysqli_num_rows($result)>0){
		while ($applicantrow = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<th>" . $applicantrow['name'] ."</th>";
			echo "<th>" . $applicantrow['mail'] ."</th>";
			echo "<th>" . $applicantrow['phone'] ."</th>";
			echo "<th> MCQ score: " . $applicantrow['mcqscore'] ."</th>";
			$app_id = $applicantrow['app_id'];
			//MCQs
			/*
			$sql22="SELECT * FROM `mcqans` WHERE app_id = '$app_id'";
			$result22 = $conn->query($sql22);
			if (mysqli_num_rows($result22)>0) {
				while ($mcqrow = mysqli_fetch_array($result22)) {
					if ($mcqrow['answer'] != "") {
						$q_id = $mcqrow['mcq_id'];
						$sql33="SELECT * FROM `mcq` WHERE mcq_id = '$q_id'";
						$result33 = $conn->query($sql33);
						if (mysqli_num_rows($result33) > 0) {
							while ($mc = mysqli_fetch_array($result33)) {
								echo "<th>MCQ header: " . $mc['mcq_q'] ."</th>";
								echo "<th>MCQ Choice: " . $mcqrow['answer'] ."</th>";
								echo "<th>MCQ Answer: " . $mc[$mcqrow['answer']] ."</th>";
							}
						}
						
					}
					
				}
			}else{
					echo "<th>No MCQ Answers</th>";
				}
			*/				
			//Questions 
			$sql2="SELECT * FROM `answers` WHERE app_id = '$app_id'";
			$result2 = $conn->query($sql2);
			if (mysqli_num_rows($result2)>0) {
				while ($answerrow = mysqli_fetch_array($result2)) {
					if ($answerrow['answer'] != "") {
						$q_id = $answerrow['q_id'];
						$sql3="SELECT * FROM `questions` WHERE q_id = '$q_id'";
						$result3 = $conn->query($sql3);
						if (mysqli_num_rows($result3) > 0) {
							while ($qrow = mysqli_fetch_array($result3)) {
								echo "<th>Question Header: " . $qrow['question'] ."</th>";
							}
						}
						$valueOfScore = 0;
						$sql4="SELECT * FROM `resultsq` WHERE `q_id`=$q_id AND `app_id`='$app_id' ";
						$result4 = $conn->query($sql4);
						if ($result4 ) {
							if (mysqli_num_rows($result4) > 0) {
								while ($scorerow = mysqli_fetch_array($result4)) {
									$valueOfScore = $scorerow['score'];
								}
							}
						}	
						echo "<th>Answer: " . $answerrow['answer'] ."</th>";
						echo '<th><form method= "post" action="" id="form_'.$app_id.'_forQ_'.$q_id.'">
							<input type="hidden" name="app_id" value="'.$app_id.'">
 							<input type="hidden" name="q_id" value="'.$q_id.'">
  							<input type="text" class="form-control" name="score" placeholder="Score" value="'.$valueOfScore.'" style="width:90px" aria-describedby="basic-addon1">
							<input type="submit" id="submit_'.$app_id.'_forQ_'.$q_id.'" name ="submit" value="Update Score of that question"class="btn btn-default"/><br ><div id="messagesubmit_'.$app_id.'_forQ_'.$q_id.'"></div></form></th>';
							
					}
					
				}
			}else{
					echo "<th>No Questions Answers</th>";
				}

			echo "</tr>";
		}
	}
?>
</table>
<center>
<nav>
  <ul class="pagination">
    <li>
      <a href='result.php?wk=<?= $wk ?>&page=<?=$pageNum - 1 ?>' aria-label="Previous">
        <span aria-hidden="true">&laquo;Back</span>
      </a>
    </li>
    <li>
      <a href='result.php?wk=<?= $wk ?>&page=<?=$pageNum + 1 ?>' aria-label="Next">
        <span aria-hidden="true">Next&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</center>

</body>
</html>