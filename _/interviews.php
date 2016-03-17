<?php
include 'dbConn.php';
$app_id=mysqli_real_escape_string($conn,$_GET['app_id']);
$query1=mysqli_query($conn,"SELECT * FROM `applicants` WHERE app_id='{$app_id}' ");
while($row=mysqli_fetch_assoc($query1))
{
$passed=$row['passed'];
$name=$row['name'];
$wk = $row['workshop'];
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
			<p>choose interview date and time </p>
			<?php if($passed) : ?>
				<form action="intersave.php" method="post">
				<input type="hidden" name="app_id" value="<?= $app_id?>" >

				<select name="inter_id" class="inter_id">
				<?php
				$query2=mysqli_query($conn,"SELECT workshop FROM `applicants` WHERE app_id='{$app_id}' ") or die(mysqli_error($conn));
				while($row=mysqli_fetch_assoc($query2))
				{
				$workshop=$row['workshop'];
				}
				$query3=mysqli_query($conn,"SELECT * FROM `interview` WHERE workshop='{$workshop}' AND slots >0 ") or die(mysqli_error($conn));
				while($row=mysqli_fetch_assoc($query3))
				{
				  echo '<option  value="'.$row['inter_id'].'">'.$row['date'].'</option>' ;

				}


				?>
				</select>
				<input type="hidden" class="intTime" name="intTime" />
				</br>
				<input class ="submit" type="submit">
				</form>

				<?php else : ?>

				<p> Sorry you didn't pass the test </p>

				<?php endif; ?>
			<footer>
				<a href="https://www.facebook.com/GSC.ASU"> <p id="prob"> Report problem </p>
				<img src="img/notify.png" style="height:30px;"> </a>
			</footer>
		</section>
		<script src="js/jquery.js"></script>
		<script>
			//console.log("hi");
			//console.log($('.inter_id option:selected').text());
			$('.intTime').val($('.inter_id option:selected').text());
			//console.log($('.intTime').val());
			
			$('.inter_id').on('click',function()
			{
				$('.intTime').val($('.inter_id option:selected').text());
				//console.log($('.intTime').val());
			});
			
		</script>
	</body>
</html>
