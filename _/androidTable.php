<!DOCTYPE html>
<html>
<body>
<p1>Android</p1>
<table border="1" >
<?php
include 'dbConn.php';


$query1=mysqli_query($conn,"SELECT * FROM `applicants` WHERE workshop = 'Android' AND passed=1 ") or die(mysqli_error($conn));

$x=0;
while($row2=mysqli_fetch_assoc($query1))
{
	echo '<tr>',
	'<td>'.++$x.'</td>',
     '<td>'.$row2['name'].'</td>',
     '<td>'.$row2['workshop'].'</td>',		
     '<td>'.$row2['date'].'</td>',
     '<td>'.$row2['phone'].'</td>',
     '</tr>' ;
}
  ?>

</table>

</body>
</html>