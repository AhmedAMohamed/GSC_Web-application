<!DOCTYPE html>
<html>
<body>
<p1>Sunday</p1>
<table border="1" style="width:100%">
<?php
include 'dbConn.php';

$no=mysqli_query($conn,"SELECT COUNT(*) FROM `applicants` WHERE workshop= 'Game Development' AND inter_id >0 ;");
$no=mysqli_fetch_assoc($no);
var_dump($no);

$query1=mysqli_query($conn,"SELECT * FROM `interview` WHERE date LIKE '%Sun%' ") or die(mysqli_error($conn));

while($row1=mysqli_fetch_assoc($query1))
{
$inter_id=$row1['inter_id'];
$query2=mysqli_query($conn,"SELECT * FROM `applicants` WHERE inter_id='{$inter_id}' ") or die(mysqli_error($conn));

while($row2=mysqli_fetch_assoc($query2))
{
echo '<tr>',
     '<td>'.$row2['name'].'</td>',
     '<td>'.$row2['workshop'].'</td>',		
     '<td>'.$row1['date'].'</td>',
     '<td>'.$row2['phone'].'</td>',
     '</tr>' ;
  }
  }
  ?>
</table>
<br>
<p1>Monday</p1>
<table border="1" style="width:100%">
<?php
include 'dbConn.php';
$query1=mysqli_query($conn,"SELECT * FROM `interview` WHERE date LIKE '%Mon%' ") or die(mysqli_error($conn));

while($row1=mysqli_fetch_assoc($query1))
{
$inter_id=$row1['inter_id'];
$query2=mysqli_query($conn,"SELECT * FROM `applicants` WHERE inter_id='{$inter_id}' ") or die(mysqli_error($conn));

while($row2=mysqli_fetch_assoc($query2))
{
echo '<tr>',
     '<td>'.$row2['name'].'</td>',
     '<td>'.$row2['workshop'].'</td>',		
     '<td>'.$row1['date'].'</td>',
     '<td>'.$row2['phone'].'</td>',
     '</tr>' ;
  }
  }
  ?>
</table>
<br>

<p1>Tuesday</p1>
<table border="1" style="width:100%">
<?php
include 'dbConn.php';
$query1=mysqli_query($conn,"SELECT * FROM `interview` WHERE date LIKE '%Tue%' ") or die(mysqli_error($conn));

while($row1=mysqli_fetch_assoc($query1))
{
$inter_id=$row1['inter_id'];
$query2=mysqli_query($conn,"SELECT * FROM `applicants` WHERE inter_id='{$inter_id}' ") or die(mysqli_error($conn));

while($row2=mysqli_fetch_assoc($query2))
{
echo '<tr>',
     '<td>'.$row2['name'].'</td>',
     '<td>'.$row2['workshop'].'</td>',		
     '<td>'.$row1['date'].'</td>',
     '<td>'.$row2['phone'].'</td>',
     '</tr>' ;
  }
  }
  ?>
</table>
<br>

<p1>Wednesday</p1>
<table border="1" style="width:100%">
<?php
include 'dbConn.php';
$query1=mysqli_query($conn,"SELECT * FROM `interview` WHERE date LIKE '%Wed%' ") or die(mysqli_error($conn));

while($row1=mysqli_fetch_assoc($query1))
{
$inter_id=$row1['inter_id'];
$query2=mysqli_query($conn,"SELECT * FROM `applicants` WHERE inter_id='{$inter_id}' ") or die(mysqli_error($conn));

while($row2=mysqli_fetch_assoc($query2))
{
   echo '<tr>',
     '<td>'.$row2['name'].'</td>',
     '<td>'.$row2['workshop'].'</td>',		
     '<td>'.$row1['date'].'</td>',
     '<td>'.$row2['phone'].'</td>',
     '</tr>' ;

  }
  }
  ?>
</table>

<br>

<p1>Thursday</p1>
<table border="1" style="width:100%">
<?php
include 'dbConn.php';
$query1=mysqli_query($conn,"SELECT * FROM `interview` WHERE date LIKE '%Thu%' ") or die(mysqli_error($conn));

while($row1=mysqli_fetch_assoc($query1))
{
$inter_id=$row1['inter_id'];
$query2=mysqli_query($conn,"SELECT * FROM `applicants` WHERE inter_id='{$inter_id}' ") or die(mysqli_error($conn));

while($row2=mysqli_fetch_assoc($query2))
{
   echo '<tr>',
     '<td>'.$row2['name'].'</td>',
     '<td>'.$row2['workshop'].'</td>',		
     '<td>'.$row1['date'].'</td>',
     '<td>'.$row2['phone'].'</td>',
     '</tr>' ;

  }
  }
  ?>
</table>

<br>

<p1>Saturday</p1>
<table border="1" style="width:100%">
<?php
include 'dbConn.php';
$query1=mysqli_query($conn,"SELECT * FROM `interview` WHERE date LIKE '%Sat%' ") or die(mysqli_error($conn));

while($row1=mysqli_fetch_assoc($query1))
{
$inter_id=$row1['inter_id'];
$query2=mysqli_query($conn,"SELECT * FROM `applicants` WHERE inter_id='{$inter_id}' ") or die(mysqli_error($conn));

while($row2=mysqli_fetch_assoc($query2))
{
   echo '<tr>',
     '<td>'.$row2['name'].'</td>',
     '<td>'.$row2['workshop'].'</td>',		
     '<td>'.$row1['date'].'</td>',
     '<td>'.$row2['phone'].'</td>',
     '</tr>' ;

  }
  }
  ?>
</table>

</body>
</html>