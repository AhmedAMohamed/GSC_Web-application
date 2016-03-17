<?php
require 'dbConn.php' ;
require 'includes/functions.php';

$enc_id=$_GET['code'];

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
			// var_dump($row);
		}
	}
	
	
	
?>

<html>
Welcome <i><?php echo " ".$name." "; ?></i>
press begin when you are ready
	<form method="post" action="pst.php">
	<input type="hidden" name="app_id" value="<?php echo $enc; ?>" />
	<input type="submit" value="Begin"/>
	</form>
</html>



