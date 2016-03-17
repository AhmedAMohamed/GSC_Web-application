<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Gollars Game | Login</title>
	<link rel="shortcut icon" href="<?php echo base_url("/assets/img/ico/ico.png"); ?>" />
	<style type="text/css">

	/*::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }
*/
body
{
	overflow: hidden;
	background:black !important;
}
	
.simpldon-holder{
	width: 100%;
	max-width: 1400px;
}
	
#container-mnbly{
		height:100px;
		width: 250px;
		/*background-color:rgba(255,255,255,.6);*/
		/*border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;*/
		margin-top: 27%;
		margin-left: 10%;
		float: left;
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
	width: 240px;
	height: 20px;
	padding: 5px;
	box-shadow: none;
	border: 1px solid #ccc;
	font-style: italic;
}
#gsc-m{
	border-radius: 5px 5px 0 0;
}
#gsc-p{
	border-radius: 0 0 5px 5px ;
}
#gsc-l{
	width: 250px;
	height: 33px;
	font-size: 18px;
	cursor: pointer;
	color: #F2F2F2;
	font-size: 18px;
	margin-top:5px;
	background:#FF9800;
	border-radius:5px;
	outline: none;border:none;
	transition:background .5s;
}
#gsc-l:hover{background:#0D47A1;}
.gsc-slider-bg{
	width: 100%;
	height: 100%;
	top: 0;
	position: absolute;
	background: url(<?php echo base_url("assets/img/bg/login-bg/1.jpg");?>);
	background-size: cover;
	background-position: center;
	z-index: -2;
	-webkit-filter: blur(0px);
    -moz-filter: blur(0px);
    -ms-filter: blur(0px);
    -o-filter: blur(0px);
    filter: blur(0px);
}
.gsc-slider-cover{
	width: 100%;
	height: 100%;
	top: 0;
	position: absolute;
	background: url(<?php echo base_url("assets/img/bg/login-bg/cover.png");?>);
	background-size: cover;
	background-position: center;
	z-index: -1;
	right: -150px;
	opacity: 0;
}
.gsc-cover-box{
	float: right;margin-top: 75px;
	position: relative;
	font-family: Open Sans;
	font-size: 20px;
	color: #F2F2F2;
}
.img-info-mnbly{
	margin-left: 50px !important;
}
	</style>
<link rel="stylesheet" type="text/css"  href="<?php echo base_url("/assets/css/style.css");?>" >
</head>
<body>
<center>
	
	<div class="container-mnbly">
		<div class="head-mnbly">
			<div class="head-container">
				
				<div class="img-info-mnbly">
				</div>
			</div>
		</div>
	</div>
	<div class="simpldon-holder">
	<div id="container-mnbly">
	

	<form action= <?php echo base_url('login/login_verification'); ?> method='post'>
		<div class="gsc-mail"><input type='text' name='mail' placeHolder='Email' class="field" id="gsc-m" autofocus="autofocus"></div>
		<div class="gsc-pass"><input type='password' name='password' placeHolder='Password' class="field" id="gsc-p"></div>
		<div class="gsc-login"><input type='submit' text='Submit' value="Login" id="gsc-l"></div>
	</form>

	
</div>
</div>
</center>
<div class="gsc-slider-bg">
</div>
<div class="gsc-slider-cover">
	<div class="gsc-cover-box" style="text-align:right;margin-right:20px;">
		<h1> welcome to GSC-Monobly</h1>
		<h2> keep updated with latest actions</h2>
		<h3>check our store</h3>
		<h4>And spectate your friends </h4>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js")?>"></script>
<script type="text/javascript">

var i=2;

$( window).load(function()
{
	//$('.ad-but-container').delay(2600).fadeIn(1000);
	changeBg=setInterval(function()
	{
		$('.gsc-slider-bg').css('display','block');
		$('.gsc-slider-bg').animate({opacity: 0}, 100, function()
			{
				$('.gsc-slider-bg').css('background-image','url(<?php echo base_url("assets/img/bg/login-bg/");?>/'+ i +'.jpg)').animate({opacity: 1},500);
			});
		i++;
		if(i>6){i=1;}
	},5000);
	$(".gsc-slider-cover").animate(
			{
				right:"0px",
				opacity:"1"
			},1000);

});
</script>
</body>
</html>