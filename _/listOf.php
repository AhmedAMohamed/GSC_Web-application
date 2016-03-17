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
include 'dbConn.php';
if(isset($_GET['accept'])){
	echo "<h3><a href='resultToPass.php?wk=".$wk."'>Main List</a></h3>";
	$accept = $_GET['accept'];
	if ($accept == 1) {
		echo "<h2>Accepted List</h2>";
		echo '<table class="table table-hover">';
			$sql2="SELECT * FROM applicants WHERE workshop = '$workshop' AND passed = 1";
			$result2 = $conn->query($sql2);
			if (mysqli_num_rows($result2)>0) {
				while ($qrow = mysqli_fetch_array($result2)) {
					$app_id = $qrow['app_id'];
					$sql3="SELECT * FROM applicants WHERE app_id = '$app_id'";
					$result3 = $conn->query($sql3);
					if (mysqli_num_rows($result3)>0) {
						while ($applicantrow = mysqli_fetch_array($result3)) {
							echo "<tr>";
							echo "<th>" . $applicantrow['name'] ."</th>";
							echo "<th>" . $applicantrow['mail'] ."</th>";
							echo "<th>" . $applicantrow['phone'] ."</th>";
							echo "<th> MCQ score: " . $applicantrow['mcqscore'] ."</th>";
							$qresult = 0;
							$sql4="SELECT * FROM resultsq WHERE app_id = '$app_id'";
							$result4 = $conn->query($sql4);
							if (mysqli_num_rows($result4)>0) {
								while ($q_row = mysqli_fetch_array($result4)) {
									$qresult = $qresult + $q_row['score'];
								}
							}
							echo "<th> Questions score: " . $qresult ."</th>";
							echo '<th id="rejected_'.$app_id.'"><button type="button" id="reject_'.$app_id.'" class="btn btn-danger">Reject</button>
							<script>$("#reject_'.$app_id.'" ).click(function(){
								    $.post("updateQScore.php",
								    {
								        reject: 1,
								        app_id: "'.$app_id.'"
								    },
								    function(data, status){
								        $("#accept_'.$app_id.'").remove();
								        $("#reject_'.$app_id.'").remove();
								        $("#rejected_'.$app_id.'").html("Rejected <a href=\"listOf.php?accept=0\">If you need to change go list of rejects</a>");
								    });
								});
								</script></tr>';

						}
					}
				}
			}

		echo "</table>";
	}else if($accept == 0){
		echo "<h2>Rejected List</h2>";
		echo '<table class="table table-hover">';
			$sql2="SELECT * FROM applicants WHERE workshop = '$workshop' AND passed = 0";
			$result2 = $conn->query($sql2);
			if (mysqli_num_rows($result2)>0) {
				while ($qrow = mysqli_fetch_array($result2)) {
					$app_id = $qrow['app_id'];
					$sql3="SELECT * FROM applicants WHERE app_id = '$app_id'";
					$result3 = $conn->query($sql3);
					if (mysqli_num_rows($result3)>0) {
						while ($applicantrow = mysqli_fetch_array($result3)) {
							echo "<tr>";
							echo "<th>" . $applicantrow['name'] ."</th>";
							echo "<th>" . $applicantrow['mail'] ."</th>";
							echo "<th>" . $applicantrow['phone'] ."</th>";
							echo "<th> MCQ score: " . $applicantrow['mcqscore'] ."</th>";
							$qresult = 0;
							$sql4="SELECT * FROM resultsq WHERE app_id = '$app_id'";
							$result4 = $conn->query($sql4);
							if (mysqli_num_rows($result4)>0) {
								while ($q_row = mysqli_fetch_array($result4)) {
									$qresult = $qresult + $q_row['score'];
								}
							}
							echo "<th> Questions score: " . $qresult ."</th>";
							echo '<th id="accepted_'.$app_id.'"><button type="button" id="accept_'.$app_id.'" class="btn btn-success">Accept</button>
							<script>$("#accept_'.$app_id.'" ).click(function(){
								    $.post("updateQScore.php",
								    {
								        accept: 1,
								        app_id: "'.$app_id.'"
								    },
								    function(data, status){
								        $("#accept_'.$app_id.'").remove();
								        $("#reject_'.$app_id.'").remove();
								        $("#accepted_'.$app_id.'").html("Accepted <a href=\"listOf.php?accept=1\">If you need to change go list of rejects</a>");
								    });
								});
								</script></tr>';

						}
					}
				}
			}

		echo "</table>";
	}
}else{
	echo "Run Away";
}