<?php 
$done=-1;
	if(isset($_GET['done']))
	{
		if($_GET['done']==1)
		{
			$done=1;
			$completeMessage=
			"	<span id='mess'>
					<p>Registration complete </p>
					<p>Good Luck in your online test ;)</p>
				</span>
			";
		}
		elseif($_GET['done']==0)
		{
			$done=0;
			$completeMessage=
			"	<div id='mess' style='background:white;padding:5px;'>
					<p style='color:red;'>Registration failed </p>
					<p style='color:red;'>Email is already registered</p>
				</div>
			";
		}
	}


			

?>


 <!DOCTYPE html>
 <html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<center>
	<div class="header">
      <div class="logo"></div>
    </div>
</center>



	
	</form>


<div id="form">
	<form action="register.php" method="POST">
		<input type="text" id="name" name="name" placeholder="Name"  required>
		<br>
	
		<input type="tel" id="phone" name="phone" maxlength="11" placeholder="Mobile" required pattern="[0-9]{11}">
		<br>
	
		<input type="text" placeholder="E-mail" name="mail" id="mail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
		<br>

		<select name="College" placeholder="College" required>
			<option value="Engineering">Engineering</option>
			<option value="Computer Science">Computer Science</option>
			<option value="other">Other</option>
		</select>
		<br>
	
		<select name="Year" placeholder="Year" required>
			<option value="Prep">Prep</option>
			<option value="First">First</option>
			<option value="Second">Second</option>
			<option value="Third">Third</option>
			<option value="Fourth">Fourth</option>
		</select>
		<br>
		
		<select name="Workshop" placeholder="Workshop" required>
			<option value="Android">Android</option>
			<option value="Game Development">Game Development</option>
			<option value="Ad Class">Ad Class</option>
			<option value="Youtube">Youtube</option>
		</select>
		
		<br>
		<input type="submit" value="Submit" id="submit" name="submit">
		</br>
		<?php if($done!=-1)
		{
			echo $completeMessage;
		}
		?>
	</form>

<!-- <div id="badges">
	<img src="Registration/badges.png">
</div> -->


	 <div class="badges">
        <div class="and"></div>
        <div class="add"></div>
        <div class="you"></div>
        <div class="gd"></div>
      </div>

</div>





</body>
<script src="js/jquery.js"></script>
<script>
	setTimeout(function(){ $('#mess').fadeOut(); }, 2000);
</script>


	</html>
