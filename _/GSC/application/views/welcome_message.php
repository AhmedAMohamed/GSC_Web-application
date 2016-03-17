<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to GSC</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background:url(<?php echo base_url("assets/img/gsc.png");?>);
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
	
	#container-fashe5{
		height:200px;
		margin-top: 20%;
		background-color:rgba(255,255,255,.9);
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
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
#field
{
	width:200px;
	height:20px;
}
	</style>
</head>
<body>
<center>
	<div id="container-fashe5">
	
		<h1>Welcome to GSC!</h1>
		<h3>please enter your serial number</h3>
		<form action= <?php echo base_url('entry_check/check_serial') ?> method='get' >
		
			<input type='text' name='serial_num' id="field"></br>
			<input type='submit' text='okay' id="sub">
		
		</form>
		

		
	</div>
</center>
</body>
</html>