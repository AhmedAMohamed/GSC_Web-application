<div class="gsc-container-mnbly">
	<div class="profile-container-mnbly">
		<div class="account-profile-info-mnbly">
			<div class="the-info-mnbly">
			<div class="up-info-mnbly">
				<div class="account-img-mnbly" style="background:url(<?php echo base_url($data->profile_img_path);?>);">
				</div>
				<div class="account-left-info">
					<div class="account-name-mnbly">
					<?php echo "<span style='font-weight:200;'>".$data->first_name."</span><span style='font-weight:600;'> ".$data->last_name."</span>";?>
					</div>
					<div class="account-position-mnbly">
					<?php echo $data->position;?>
					</div>
					<div class="account-committee-mnbly">
						<?php echo $data->committe; ?> 
					</div>
				</div>
				<div class="account-right-info">
					
						
						<div class="account-rank-logo-mnbly" title="Nooglar">
				
						</div>
						<!-- <div class="account-rank-name-mnbly"><?php //echo $rank_id; ?></div> -->
					
				</div>
				</div>
				
				<center>
				<div class="account-money-mnbly">
				<div class="money-container-mnbly-again">
							<div class="gollar-sign-cont-mnbly">
								<div class="gollar-sign-mnbly-info"></div>
							</div>
							<div class="money-value-mnbly-again">
								<div class="money-value-text-mnbly"><?php echo number_format($data->money).".00";?></div>								
							</div>
							
							<div class="gollars-add-mnbly">
							+
							</div>
							
				</div>
				<div class="account-xp-mnbly-again">
					<div class="xp-add-mnbly">
					+
					</div>
					<div class="xp-cont-mnbly">
						XP
					</div>
					<div class="exp-text-mnbly"style="margin-top:8px;"><?php echo $data->exp;?></div>
				</div>
				</div>
				</center>		
						
			</div>
			
			
			
			
			
		</div>
		<div class="account-padges-info-mnbly">
			<span class="badges-info-title">Badges : </span>
			<div class="badges-cont-mnbly">
			<?php for($i=0;$i<0;$i++): ?>
				<div class="badges-model-mnbly">
					<div class="badges-model-img" style="background:url(<?php echo base_url("assets/img/GSC_Badges/starpadte.png");?>);"></div>
					<div class="badges-model-title" >Badge <? echo $i; ?></div>
				</div>
			<?php endfor; ?>
			</div>
		</div>
		<div class="account-actioncards-info-mnbly">
			<span class="cards-info-title">Action Cards : </span>
		</div>
		<div class="account-settings-info-mnbly">
			<span class="settings-info-title">Settings : </span>
		</div>
	</div>
</div>






<!-- XP  -->
<div class="bobBackground-X">
	<div class="ADD-XP-FORM">
		<div class="bobHead">
			<div class="bobTitle">
				Add XP
			</div>
			<div class="bobClose">&#10006;</div>
		</div>
		<input type="number"  min="0" class="xpAmount"  placeholder="Enter Amount Here" required value="0"/>
		<input type="hidden" class="memberId" value="<?php echo $data->id; ?>" />
		<button type="button" class="addXpButton"> ADD XP </button>
	</div>
</div>



<!-- gOLLARS -->
<div class="bobBackground-G">
	<div class="ADD-G-FORM">
		<div class="bobHead">
			<div class="bobTitle">
				Add Gollars
			</div>
			<div class="bobClose">&#10006;</div>
		</div>
		<input type="number"  min="0" class="gollarsAmount"  placeholder="Enter Amount Here" required value="0"/>
		<input type="hidden" class="memberId" value="<?php echo $data->id; ?>" />
		<input type="hidden" class="currentMoney" value="<?php echo $data->money ; ?> " />
		<button type="button" class="addGButton"> ADD Gollars </button>
	</div>
</div>



