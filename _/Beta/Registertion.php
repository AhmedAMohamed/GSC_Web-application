 <!DOCTYPE html>
 <html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<title>Registration</title>
<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<center>
<div class="main">
	<div id="logo">
	<img  src="logo.png">
	</div>

	<div id="bar" width="310px" height="100%">
		<p>GSC | Registration</p>
	</div>

		
	<form action="register.php" method="POST">
	<input type="text" id="name" name="name" placeholder="Name"  required>
	<br>
	<br>
	<input type="tel" id="phone" name="phone" maxlength="11" placeholder="Mobile" required pattern="[0-9]{11}">
	<br>
	<br>
	<input type="text" placeholder="E-mail" name="mail" id="mail" required pattern="[a-zA-Z0-9]{3,}@[a-zA-Z]{2,}[.]{1}[a-zA-Z]{2,}">
	<br>
	<br>
	<select name="College" placeholder="College" required>
		<option value="Engineering">Engineering</option>
		<option value="Computer Science">Computer Science</option>
	</select>
	<br>
	<br>
	<select name="Year" placeholder="Year" required>
		<option value="Prep">Prep</option>
		<option value="First">First</option>
		<option value="Second">Second</option>
		<option value="Third">Third</option>
		<option value="Fourth">Fourth</option>
	</select>
	<br>
	<br>
	<select name="Workshop" placeholder="Workshop" required>
		<option value="Android">Android</option>
		<option value="Game Development">Game Development</option>
		<option value="Ad Class">Ad Class</option>
		<option value="Youtube">Youtube</option>
	</select>
	<br>
	<br>
	<input type="submit" value="Submit" id="submit" name="submit">
	</form>
</div>
</center>
	</body>
 </html>
