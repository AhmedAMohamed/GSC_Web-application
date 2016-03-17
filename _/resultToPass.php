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
    <h2>Main List</h2>
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

$sql="SELECT * FROM `applicants` WHERE  workshop = '$workshop' AND takenquiz = 1 ";
	$result = $conn->query($sql); 
	if(mysqli_num_rows($result)>0){
		while ($applicantrow = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<th>" . $applicantrow['name'] ."</th>";
			echo "<th>" . $applicantrow['mail'] ."</th>";
			echo "<th>" . $applicantrow['phone'] ."</th>";
			echo "<th> MCQ score: " . $applicantrow['mcqscore'] ."</th>";
			$app_id = $applicantrow['app_id'];
			$qresult = 0;
			$sql2="SELECT * FROM resultsq WHERE app_id = '$app_id'";
			$result2 = $conn->query($sql2);
			if (mysqli_num_rows($result2)>0) {
				while ($qrow = mysqli_fetch_array($result2)) {
					$qresult = $qresult + $qrow['score'];
				}
			}
			$ifDone = 0;
			if ($applicantrow['passed']==1 || $applicantrow['passed']==0 && $applicantrow['passed'] != NULL ) {
				$ifDone = 1;
			}
			$ifaccept = $applicantrow['passed'];

			echo "<th> Questions score: " . $qresult ."</th>";
			if ($ifDone == 0) {
			
			echo '<th  id="accepted_'.$app_id.'" ><button type="button" id="accept_'.$app_id.'" class="btn btn-success">Accept</button></th>';
			echo '<th id="rejected_'.$app_id.'"><button type="button" id="reject_'.$app_id.'" class="btn btn-danger">Reject</button>
			<script>
			$("#accept_'.$app_id.'" ).click(function(){
			    $.post("updateQScore.php",
			    {
			        accept: 1,
			        app_id: "'.$app_id.'"
			    },
			    function(data, status){
			        $("#accept_'.$app_id.'").remove();
			        $("#reject_'.$app_id.'").remove();
			        $("#accepted_'.$app_id.'").html("Accepted <a href=\"listOf.php?wk='.$wk.'&accept=1\">If you need to change go list of accepteds</a>");
			    });
			});
			$("#reject_'.$app_id.'" ).click(function(){
			    $.post("updateQScore.php",
			    {
			        reject: 1,
			        app_id: "'.$app_id.'"
			    },
			    function(data, status){
			        $("#accept_'.$app_id.'").remove();
			        $("#reject_'.$app_id.'").remove();
			        $("#accepted_'.$app_id.'").html("Rejected <a href=\"listOf.php?wk='.$wk.'&accept=0\">If you need to change go list of rejects</a>");
			    });
			});
			</script>
			</th>';
			}elseif ($ifDone == 1 ) {
				if ($ifaccept) {
					echo "<th>Accepted <a href='listOf.php?wk=".$wk."&accept=1'>If you need to change go list of accepteds</a><th>";
				}else{
					echo "<th>Rejected <a href='listOf.php?wk=".$wk."&accept=0'>If you need to change go list of rejects</a><th>";
				}
			}
			echo "</tr>";
		}
	}
?>
</table>