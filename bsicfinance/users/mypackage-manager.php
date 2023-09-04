<?php (defined('__users_dir') && isset($investment)) or die; ?>

<div class='my-1 py-1'></div>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" onsubmit="return confirm('Please confirm this action');">
	
	<input type='hidden' name='id' value='<?php echo $investment['id']; ?>'>
	<input type='hidden' name='awoof' value='<?php echo $investment['bonus']; ?>'>
	
    <div class="page-inner ">
	
		<?php sysfunc::html_notice( $temp->msg ?? null, $temp->status ?? null ); ?>
		
        <div class="row row-card-no-pd mt--2">
			<?php
				
				section::card(array(
					"icon" => "fa fa-user-circle",
					"color" => "success",
					"title" => "investment type",
					"value" => $investment['pname']
				));
				
				section::card(array(
					"icon" => "fa fa-send",
					"color" => "primary",
					"title" => "daily profit",
					"value" => $investment['increase'] . '%'
				));
				
				section::card(array(
					"icon" => "fa fa-trophy",
					"color" => "success",
					"title" => "total profit",
					"value" => '$' . $investment['increased_usd']
				));
				
			?>
        
		</div>
	
        <div class="row row-card-no-pd mt--2">
			<?php
				
				section::card(array(
					"icon" => "fa fa-clock-o",
					"color" => "primary",
					"title" => "activation date",
					"value" => !empty($investment['activation_date']) ? $investment['activation_date'] : 'Pending...'
				));
				
				section::card(array(
					"icon" => "fa fa-hourglass-half",
					"color" => "orange",
					"title" => "end date",
					"value" => !empty($investment['deactivation_date']) ? $investment['deactivation_date'] : 'Pending...'
				));
				
				section::card(array(
					"icon" => "fa fa-balance-scale",
					"color" => "primary",
					"title" => "Duration",
					"value" => $investment['duration'] . ' days'
				));
				
			?>
        
		</div>
	
        <div class="row row-card-no-pd mt--2">
			<?php
				
				section::card(array(
					"icon" => "fa fa-diamond",
					"color" => "orange",
					"title" => "Amount Invested",
					"value" => '$' . $investment['amount']
				));
				
				
				##
				
				$investment['status'] = (int)$investment['status'];
				
				if( empty($investment['status']) ) $status = 'Inactive';
				else if( $investment['status'] < 0 ) $status = 'Ended';
				else $status = 'Active';
				
				section::card(array(
					"icon" => "fa fa-info-circle",
					"color" => "success",
					"title" => "status",
					"value" => $status
				));
				
				
				if( empty($investment['status']) ):
				
					section::card(array(
						"icon" => "fa fa-wrench",
						"color" => "orange",
						"title" => "Action",
						"value" => "<button class='btn btn-success' name='action' value='activate'>Activate</button>"
					));
					
				else: 
				
					boxclone(array(
						"icon" => "fa fa-power-off",
						"bg_color" => "var(--danger)",
						"title" => "End Package",
						"value" => call_user_func(function() use($investment) {
							if( $investment['status'] > 0 )
								return "<button class='btn btn-secondary' name='action' value='end'>End Package</button>";
							else return "<button class='btn btn-danger' disabled>Package Ended</button>";
						})
					));
				
				endif;
				
			?>
        
		</div>
			
   </div>
</form>