<?php

require __dir__ . '/sub-config.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	$temp->msg = call_user_func(function() {
		
		global $temp, $link, $__user;
		
		$_POST = sysfunc::sanitize_input($_POST);
		
		$package = $link->query( "
			SELECT * FROM packages 
			WHERE status = 1 AND id = '{$_POST['id']}'
		" )->fetch_assoc();
		
		if( !$package ) return "The selected package is currently not available";
		
		$packname = "<span class='text-primary text-capitalize'>{$package['pname']}</span>";
		
		if( empty($_POST['amount']) ) return "Please enter a plan amount for {$packname}";
		
		else if( (float)$_POST['amount'] < (float)$package['min_amount'] ) 
			return "Minimum investment amount for {$packname} is \${$package['min_amount']}";
		
		else if( (float)$_POST['amount'] > (float)$package['max_amount'] ) 
			return "Maximum investment amount for {$packname} is \${$package['max_amount']}";
		
		else if( (float)$__user['walletbalance'] < (float)$_POST['amount'] )
			return "Insufficient Wallet Balance";
		
		$DEBIT_SQL = "
			UPDATE users 
			SET walletbalance = (walletbalance - {$_POST['amount']})
			WHERE id = '{$__user['id']}'
		";
		
		$debit = $link->query( $DEBIT_SQL );
		
		if( !$debit ) return "Balance could not be debited for initialization of investment";
		
		$investment = array(
			"amount" => $_POST['amount'],
			"userid" => $__user['id'],
			"email" => $__user['email'],
			"pname" => $package['pname'],
			"increase" => $package['increase'],
			"bonus" => $package['bonus'],
			"date" => date("Y-m-d H:i:s"),
			"sid" => uniqid("pk_"),
			"status" => 0,
			"duration" => $package['duration']
		);
		
		$SQL = sysfunc::mysql_insert_str( 'investments', $investment );
		
		$temp->status = $link->query( $SQL );
		
		if( $temp->status ) $info = "The package was successfully selected";
		else $info = "The package was not selected";
		
		return $info;
		
	});
	
}
  

$temp->HTMLHeader[] = "
	<style>
		.cadence li {
			margin-bottom: 6px;
		}
		.cadence li:before {
			content: '\\f00c';
			font-family: 'FontAwesome';
			margin-right: 5px;
			color: var(--success);
		}
	</style>
";

include "header.php";


    ?>
	
	
	<div class="panel-header bg-primary-gradient">
		<?php section::title( "Investment Packages" ); ?>
		<?php section::price_widget(); ?> 
	</div> 

	<div class="page-inner ">
		<div class="row row-card-no-pd- mt--2">
		
			<div class='col-md-12'>
				<?php sysfunc::html_notice( $temp->msg, $temp->status ?? null ); ?>
			</div>
			
			<?php
				$SQL = "
					SELECT * FROM packages
					WHERE status = 1
					ORDER BY id DESC
				";
				$result = $link->query( $SQL );
				if( $result->num_rows ):
					while( $package = $result->fetch_assoc() ):
			?>
			
			
			<div class="col-sm-6 col-md-4  col-xs-6 mb-3" >
				<div class="card mb-4 box-shadow cadence">
					<div class="card-header">
						<h2 class="my-0 text-capitalize">
							<i class='far fa-gem mr-1'></i> <?php echo $package['pname']; ?>
						</h2>
					</div>
					<div class="card-body">
						<h1 class="card-title pricing-card-title">
							<?php echo $package['increase']; ?>% <small class="text-muted">daily profit</small>
						</h1>
						<ul class="list-unstyled mt-3 mb-4 text-capitalize">
							<li><?php echo $package['duration']; ?> Days Investment</li>
							<li>$<?php echo $package['bonus']; ?> Purchase Bonus</li>
							<li>$<?php echo $package['min_amount']; ?> MIN</li>
							<li>$<?php echo $package['max_amount']; ?> MAX</li>
						</ul>
						<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<div class='mb-1'>
								<input type='number' step='0.01' name='amount' class='form-control' placeholder='Amount To Invest' required>
							</div>
							<button type="submit" class="btn btn-lg btn-block btn-outline-primary" name="id" value="<?php echo $package['id']; ?>">
								SELECT PLAN
							</button>
						</form>
					</div>
				</div>
			</div>
			
			<?php 
					endwhile; 
				else: 
			?>
					
					NO PACKAGE AVAILABLE!
					
			<?php endif; ?>
			
		</div>
	</div>


<?php
	include 'footer.php';
	
	?>   













	<script>
		   
	$(".hover").mouseleave(
	  function () {
		$(this).removeClass("hover");
	  }
	);
	</script>