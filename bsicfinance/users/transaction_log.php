<?php

require __dir__ . '/sub-config.php';

include 'header.php';

?>

<div class="panel-header bg-primary-gradient">
	
	<?php section::title("Account Transactions"); ?>
	
	<?php section::price_widget(""); ?>
	
</div>


<div class="page-inner ">
    <div class="">
	
		<nav>
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
				<button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
					Deposit History
				</button>
				<button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
					Withdrawal History
				</button>
			</div>
		</nav>
		
		<div class="tab-content" id="nav-tabContent">
			
			<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
				<div class="card">
					<div class='card-body'>
						<div class="table-responsive">
							<table class="display table"  id="example">
								<thead>
									<tr class="info">
										<th>Email</th>
										<th>Amount(USD)</th>
										<th>Mode</th>
										<th>Status</th>
										<th>Tnx ID</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									
										$sql= "SELECT * FROM btc WHERE email='{$__user['email']}' ";
										$result = mysqli_query($link,$sql);
										
										if(mysqli_num_rows($result) > 0):
											while($row = mysqli_fetch_assoc($result)):  

												if($row['status'] == 'approved')
													$sec = 'Completed <i class="fa fa-check-circle text-success"></i>';
												else
													$sec ='Pending <i "fa  fa-refresh text-warning"></i>';
										 
										 ?>
									<tr class="primary">
										<td><?php echo $row['email'];?></td>
										<td><?php echo $row['usd'];?></td>
										<td><?php echo $row['mode'];?></td>
										<td><?php echo $sec;?></td>
										<td><?php echo $row['tnxid'];?></td>
										<td><?php echo $row['date'];?></td>
									</tr>
									<?php
												endwhile;
										endif;
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			
			<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
				<div class='card'>
					<div class='card-body'>
						<div class="table-responsive">
							<table class="display table"  id="ex">
								<thead>
									<tr class="info">
										<th>Email</th>
										<th>Amount(USD)</th>
										<th>Mode</th>
										<th>Status</th>
										<th>Tnx ID</th>
										<th>Date</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									
										$sql1= "SELECT * FROM wbtc WHERE email='{$__user['email']}' ";
										$result1 = mysqli_query($link,$sql1);
										
										if(mysqli_num_rows($result1)):
											while($row = mysqli_fetch_assoc($result1)):
										  
										
												if($row['status'] == 'approved')
													$sec = 'Completed <i class="fa fa-check-circle text-success"></i>';
												else
													$sec ='Pending <i "fa  fa-refresh text-warning"></i>';									 
										 
										 ?>
									<tr class="primary">
										<td><?php echo $row['email'];?></td>
										<td><?php echo $row['moni'];?></td>
										<td><?php echo $row['mode'];?></td>
										<td><?php echo $sec;?></td>
										<td><?php echo $row['tnx'];?></td>
										<td><?php echo $row['date'];?></td>
									</tr>
									<?php
											endwhile;
										endif;
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		
		</div>
		
    </div>
</div>
  
 
<?php include 'footer.php'; ?>
