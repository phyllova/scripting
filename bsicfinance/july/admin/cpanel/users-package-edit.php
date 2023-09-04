<?php 

require __dir__ . '/sub-config.php';

require __dir__ . '/inc/for-users-package-edit.php';

require 'header.php';

$inv = $link->query( "
	SELECT 
		investments.*,
		users.username,
		users.walletbalance,
		users.refbonus,
		users.referred
	FROM investments 
	LEFT JOIN users
		ON investments.userid = users.id
	WHERE investments.id = " . ($_GET['id'] ?? 0) 
);

$investment = ( !$inv || !$inv->num_rows ) ? [] : $inv->fetch_assoc();

if( empty($investment) ) $upline = null;
else {
    $upline = $link->query("
        SELECT * FROM users
        WHERE refcode = '{$investment['referred']}'
    ")->fetch_assoc();
};

if( !$upline ) $upline = [];

?>

<div class='card mb-5'>
		
	<h5 class='card-header'>
		Investor Package
	</h5>
	
	<div class='card-body'>
		
		<?php if( empty($investment) ): ?>
		
			<h2 class='text-center'> 
				NO INVESTOR PACKAGE FOUND 
			</h2>
		
		<?php else: ?>
		
			<?php sysfunc::html_notice( $temp->msg ); ?>
			
			<form method='post' action='<?php echo $_SERVER['REQUEST_URI']; ?>'>
			
				<div class='row'>
					<div class='col-md-7 mb-4'>
						
						<div class='form-group'>
							<label>Package Name</label>
							<input type='text' readonly class='form-control' value='<?php echo $investment['pname']; ?>'>
						</div>
						
						<div class='form-group'>
							<label>Package ID</label>
							<input type='text' readonly class='form-control' value='<?php echo $investment['sid']; ?>'>
						</div>
						
						<div class='form-group'>
							<label>Invested Amount</label>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<span class='input-group-text'>$</span>
								</div>
								<input type='number' step='0.01' class='form-control' name='package[amount]' value='<?php echo $investment['amount']; ?>'>
							</div>
						</div>
						
						<div class='form-group'>
							<label>Daily Increase</label>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<span class='input-group-text'>%</span>
								</div>
								<input type='number' step='0.01' class='form-control' name='package[increase]' value='<?php echo $investment['increase']; ?>'>
							</div>
						</div>
						
						<div class='form-group'>
							<label>Status</label>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<span class='input-group-text'>
										<i class='fa fa-question-circle'></i>
									</span>
								</div>
								<select class='form-control' name='package[status]'>
								<?php 
									$status = array(
										"1" => "Active",
										"0" => "Inactive",
										"-1" => "Ended"
									);
									foreach($status as $key => $value): 
										$select = ($key == $investment['status']) ? "selected" : null;
								?>
									<option value='<?php echo $key; ?>' <?php echo $select; ?>><?php echo $value; ?></option>
								<?php endforeach; ?>
								</select>
							</div>
						</div>
					
						<div class='form-group'>
							<label>Package Duration (Days)</label>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<span class='input-group-text'>
										<i class='fa fa-history'></i>
									</span>
								</div>
								<input type='number' class='form-control' name='package[duration]' value='<?php echo $investment['duration']; ?>'>
							</div>
						</div>
					
						<div class='form-group'>
							<label>Package Profit</label>
							<div class='alert alert-danger'>
								This does not reflect in user balance. <br>
								It is a description of the profit made from this investment package alone!
							</div>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<span class='input-group-text'>
										<i class='fa fa-dollar'></i>
									</span>
								</div>
								<input type='number' step='0.01' class='form-control' name='package[increased_usd]' value='<?php echo $investment['increased_usd']; ?>'>
							</div>
						</div>
						
						<hr>
						
					</div>
					
					<div class='col-md-5 mb-4'>
						
						<div class='border p-4'>
						
							<div class='form-group'>
								<label>Investor Username</label>
								<input type='text' readonly class='form-control' value='<?php echo $investment['username']; ?>'>
							</div>
							
							<hr>
							
							<?php
							    $bonus = (float)$investment['amount'] * (float)$settings['refbonus'] * 0.01;
							?>
							
							<div class='alert alert-warning'>
							    Upline referral bonus is $<?php echo number_format($bonus, 2); ?>
							</div>
							
							<div class='form-group'>
								<label>Upline Username</label>
								<input type='text' readonly class='form-control' value='<?php echo $upline['username'] ?? null; ?>'>
							</div>
							
							<div class='form-group'>
								<label>Upline Balance (USD)</label>
								<div class='input-group'>
									<div class='input-group-prepend'>
										<span class='input-group-text'>
											<i class='fa fa-credit-card'></i>
										</span>
									</div>
									<input type='number' step='0.01' class='form-control' name='users[walletbalance]' value='<?php echo $upline['walletbalance'] ?? 0; ?>'>
								</div>
							</div>
							
							<div class='form-group'>
								<label>Upline Bonus (USD)</label>
								<div class='input-group'>
									<div class='input-group-prepend'>
										<span class='input-group-text'>
											<i class='fa fa-users'></i>
										</span>
									</div>
									<input type='number' step='0.01' class='form-control' name='users[refbonus]' value='<?php echo $upline['refbonus'] ?? 0; ?>'>
								</div>
							</div>
							
							<input type='hidden' name='userid' value='<?php echo $upline['id'] ?? null; ?>'>
							
						</div>
						
						<hr>
						
					</div>
				</div>
				
				<input type='hidden' name='id' value='<?php echo $investment['id']; ?>'>
				
				<div class=''>
					<button class='btn btn-success btn-block'>
						<i class='fa fa-save mr-1'></i> Update Changes
					</button>
				</div>
				
			</form>
		
		<?php endif; ?>
		
	</div>

</div>

<?php require 'footer.php'; ?>