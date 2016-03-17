<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Monopoly</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background:url(../assets/img/gsc.png);
		background-repeat:no-repeat;
		background-size:cover;
		margin:0;
		font-family: 'Open Sans', sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
		background-color:rgba(255,255,255,.9);
		padding:10px;
	}
		#sub {
	background:#427fed;
	width: 90px;
	height: 33px;
	color: white;
	font-size: 18px;
	cursor: pointer;
	margin-top:10px;
	font-family: 'Open Sans', sans-serif;
	border: none;
}
.field
{
	width:200px;
	height:20px;
}
.sfield
{
width: 205px;
height: 30px;
}
	</style>

	</head>

<body>

<center>
<div id="container">
	<h1>Join The Game!</h1>
	
	<div id="Errors-div"></div>
	<form action="<?php echo base_url('registration'); ?>" method='POST' name="form" onsubmit="return ValidateTheForm()" >
	<table>
	
		<tr><td>First Name</td><td><input type='text' name='first_name' placeHolder='First Name'  onblur="Fname_check()" class="field"> </td></tr>
		<tr><td>Last Name</td><td><input type='text' name='last_name' placeHolder='Last Name'  onblur="Lname_check()" class="field"></td></tr>
		<tr><td>Phone</td><td><input type='text' name='mobile'  maxlength="11"  placeHolder='Mobile Number'  onblur="mob_check()" class="field"></td></tr>
		<tr><td>Email</td><td><input type='text' name='mail' placeHolder='Email'  onblur="email_check()" class="field"></td></tr>
		<tr><td>Password				</td><td><input type='password' name='password' placeHolder=''  onblur="pass_check()" class="field"></td></tr>
		<tr><td>Confirm Password</td><td><input type='password' name='cpassword' placeHolder=''  onblur="confirmPass()" class="field"></td></tr>
		</table>
		<input type='submit' text='Submit' id="sub">
	
	</form>
	<!--<hr><h1>OR</h1>
	<div id="googleplus">
		login with googleplus
	</div>-->
	
</div>
</center>
<script src="../assets/js/validation.js" type="text/javascript"></script>
</body>
</html>