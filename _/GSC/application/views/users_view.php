<?php
foreach($users as $user)
{	
	//echo $user->first_name." ".$user->last_name."</br>";
}
//echo var_dump($users);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Gollars Game | Community</title>

	<style type="text/css">

	
	body {
		margin:0;
		padding:0;
	}
	#users-container-mnbly{
		width:740px;
		min-height: 200px;
	}
	.user-link-mnbly{
		width: 200px;
		height: 170px;
		display: block;
		margin: 22px;
		text-decoration: none;
		color: #01579B;
		float: left;
	}
	.user-container-mnbly{
		width: 200px;
		height: 170px;
		background: #FFFFFF ;
		float: left;
		border: 2px solid #E0E0E0;
	}
	.user-cover-mnbly{
		width: 100%;
		height: 50px;
		background: #0D47A1;

	}
	.user-ppic-mnbly{
		width: 60px;
		height: 60px;
		border-radius: 50%;
		background: black;
		background-size: cover !important;
		background-position: center;
		background-repeat: no-repeat;
		margin-top: -30px;
	}
	.user-name-mnbly{
		font-size: 14px;
		font-family: Open Sans;
		font-weight: 500;
	}
	.user-position-mnbly{
		font-size: 12px;
		font-family: Open Sans;
		font-weight: 500;
		font-style: italic;
	}
	.user-committee-mnbly{
		font-size: 10px;
		font-family: Open Sans;
		font-weight: 500;
		font-style: italic;
	}
	.user-rank-mnbly{
		font-size: 16px;
		font-family: Open Sans;
		font-weight: 800;
		font-style: ;
	}
	</style>
</head>
<body>
<center>
	<div id="users-container-mnbly">
		<?php foreach($users as $user): ?>
			<a href="<?php echo base_url("community/get_user_data/".$user->id);?>" class="user-link-mnbly">
			<div class="user-container-mnbly">
				<div class="user-cover-mnbly"></div>
				<div class="user-ppic-mnbly" style="background:url(<?php echo base_url($user->profile_img_path);?>);"></div>
				<div class="user-name-mnbly"><?php echo ucfirst ($user->first_name)." ".ucfirst ($user->last_name);?></div>
				<div class="user-position-mnbly"><?php echo $user->position;?></div>
				<div class="user-committee-mnbly"><?php echo $user->committe;?></div>
				<div class="user-rank-mnbly">Nogglar</div>
			</div>
			</a>
		<?php endforeach;?>
		
	</div>
</center>
</body>
</html>