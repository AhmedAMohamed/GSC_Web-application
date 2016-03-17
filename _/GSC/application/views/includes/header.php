<html>
<head>
	<title>Gollars Game </title>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url("/assets/css/style.css");?>" >
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url("/assets/fonts/fontawesome/css/font-awesome.min.css");?>" >
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo base_url("/assets/img/ico/ico.png"); ?>" />
	<style type="text/css">
		#<?php echo $page_id;?>{
			border-bottom: 2px solid #567dbe;
		}
	</style>
</head>
<body>
<div class="container-mnbly">
	<div class="head-mnbly">
		<div class="head-container">
			<div class="menu-icon-mnbly">
				<div class="menu-icon-holder-mnbly">
					<div class="menu-icon-img-mnbly">
					</div>
				</div>
				<div class="img-info-mnbly">
				</div>
			</div>
			<div class="account-info-mnbly">
				
				
				
				<div class="career-mnbly">
					<span class="xp-title-mnbly">LEVEL <span class="level-no-mnbly">1</span></span>
					<div class="xp-info-mnbly" >
						<div class="xp-load-mnbly" style="width:<?php echo ($exp/10)?>%;">
							<div class="xp-load-shadow-mnbly">
							</div>
						</div>
					</div>
					<div class="money-info-mnbly">
						<div class="money-container-mnbly">
							<span class="money-value-mnbly"><?php echo number_format($money).".00";?></span>
							<img src="<?php echo base_url("assets/img/mnbly/gollar.png"); ?>" width=10 height=15 style="margin-left:5px;"/><!-- <div class="gollar-sign-mnbly"></div> -->
						</div>
					</div>
				</div>

			</div>
			<div class="right-div-mnbly">
				<div class="ppic-mnbly">
				</div>
				<div class="name-info-mnbly"><?php echo $first_name." ".$last_name;?></div>
			</div>
		</div>
	</div>
	<div class="side-menu-mnbly">
		
			<a href="" class="menu-tab-mnbly disabled" id="mnbly-home" title="Under Construction"><i class="fa fa-home fontawesome"></i> HOME</a>
			<a href="<?php echo base_url("profile");?>" class="menu-tab-mnbly " id="mnbly-profile"><i class="fa fa-user fontawesome"></i> PROFILE</a>
			<a href="<?php echo base_url("community");?>" class="menu-tab-mnbly " id="mnbly-community" title="Under Construction"><i class="fa fa-users"></i> COMMUNITY</a>
			<a href="" class="menu-tab-mnbly disabled" id="mnbly-home" title="Under Construction">MARKET</a>
			<a href="" class="menu-tab-mnbly disabled" id="mnbly-home" title="Under Construction">TOP PLAYERS</a>
			<a href="" class="menu-tab-mnbly disabled" id="mnbly-home" title="Under Construction">EVENTS</a>
		<div class="gsc-logo-grey-mnbly">
		</div>
		<hr color="#616161" width="90%" height="1px">
		<div class="bottom"><a href="<?php echo base_url("logout");?>" id="terms-conditions">Logout</a></div>
		<div class="bottom"><a href="<?php echo base_url("Guide");?>" id="terms-conditions">Guide</a></div>
	</div>
</div>
