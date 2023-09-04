<?php

require __dir__ . '/sub-config.php';

require "inc/for-mypackage.php";

include 'header.php';


## ---------

if( isset($_GET['id']) ) {
	
	$SQL = "
		SELECT * FROM investments
		WHERE id = '{$_GET['id']}'
		AND userid = '{$__user['id']}'
	";
	
	$investment = $link->query($SQL)->fetch_assoc();
	
} else $investment = null;

?>

<div class="panel-header bg-primary-gradient">
	
	<?php section::title("My Package"); ?>
	
	<?php section::price_widget(); ?>
	
</div>

<?php if( !$investment ): ?>

	<div class='container mt-5'>
		<div class="row">
			<div class='col-lg-12'>
			
				<div class='card'>
					<div class='card-body'>
					
				<?php
				
					$sql = "
						SELECT * FROM investments 
						WHERE userid='{$__user['id']}'
						ORDER BY id DESC
					";
					
					$result = $link->query($sql);
					
					if($result->num_rows):
				?>
				
				<div class='table-responsive'>
					<table class='table'>
						<thead>
							<tr>
								<th>Plan</th>
								<th>Investment</th>
								<th>Daily Profit</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($inv = $result->fetch_assoc()):
									
									$inv['status'] = (int)$inv['status'];
									
									if( $inv['status'] < 0 )
										$sec = "<span class='text-danger'>Ended</span>";
									else if(!empty($inv['status'])) 
										$sec = "<span class='text-success'>Active</span>";
									else $sec = "<span class='text-warning'>Inactive</span>";	
							?>
								<tr>
									<td><?php echo $inv['pname']; ?></td>
									<td>$<?php echo $inv['amount']; ?></td>
									<td><?php echo $inv['increase']; ?>%</td>
									<td><?php echo $sec; ?></td>
									<td>
										<a href='<?php echo $_SERVER['PHP_SELF'] . "?id={$inv['id']}"; ?>' class='btn btn-primary'>
											Manage
										</a>
									</td>
								</tr>
							<?php  endwhile; ?>
						</tbody>
					</table>
				</div>
				
				<?php else: ?>
				
					<div class='alert alert-info text-center'> 
						You currently have no package 
					</div>

				<?php endif; ?>	
				
					</div>
				</div>
			
			</div>
		</div>
	</div>

<?php 
	else: 
		
		require __dir__ . '/mypackage-manager.php'; 
		
	endif;
?>

<?php include 'footer.php'; ?>