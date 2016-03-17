<?php
include 'dbConn.php';
?>
<?php
if(isset($_POST['accept'])){
	$app_id = $_POST['app_id'];
	$sql= "UPDATE `applicants` SET `passed`=1 WHERE app_id = '$app_id'";
	$result = $conn->query($sql); 
}else if (isset($_POST['reject'])) {
	$app_id = $_POST['app_id'];
	$sql= "UPDATE `applicants` SET `passed`=0 WHERE app_id = '$app_id'";
	$result = $conn->query($sql);
}else{
	echo "Run Away!";
}
