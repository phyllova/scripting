<?php

require __dir__ . '/sub-config.php';

include 'inc/for-users-package.php';

include 'header.php';

?>


   <div class="card">
   
      <div class="card-header">
            <h5 class="text-center text-md-left mb-0">
				Users Package Investment
			</h5>
		</div>
		
         <div class="card-body">
            <div class="">
			
				<?php sysfunc::html_notice( $msg ); ?>
				
				<div class="table-responsive">
				  <table class="display table table-striped">
					 <thead>
						<tr class="info">
						   <th>Username</th>
						   <th>Package</th>
						   <th>Invested</th>
						   <th>Increase</th>
						   <th>ROI</th>
						   <th>Status</th>
						   <th>Invest-ID</th>
						   <th>Activation</th>
						   <th>Delete</th>
						</tr>
					 </thead>
					 <tbody>
						<?php 
						
							$sql= "
								SELECT 
									investments.*,
									users.username
								FROM investments
								LEFT JOIN users
									ON investments.userid = users.id
								ORDER BY investments.id DESC
							";
							
							$result = mysqli_query($link,$sql);
							
							if(mysqli_num_rows($result) > 0){
								while($row = mysqli_fetch_assoc($result)){ 
									
									if( $row['status'] < 0 ) $status = '<i class="text-danger">ended</i>';
									else if( !$row['status'] ) $status = '<i class="text-warning">inactive</i>';
									else $status = '<i class="text-success">active</i>';
									
							?>
						<tr class="primary">
							<td><?php echo $row['username'];?></td>
							<td><?php echo $row['pname'];?></td>
							<td>$<?php echo $row['amount'];?></td>
							<td><?php echo $row['increase'];?>%</td>
							<td>$<?php echo $row['increased_usd'];?></td>
							<td><?php echo $status; ?></td>
							<td><?php echo $row['sid'];?></td>
							<td>
								<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
									<input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
									<div class='btn-group'>
										<button class="btn btn-success" type="submit" name="activate" title="activate">
											<span class="fa fa-check"></span>
										</button>
										<button class="btn btn-warning" type="submit" name="deactivate" title="deactivate">
											<span class="fa fa-ban"></span>
										</button>
										<button class="btn btn-danger" type="submit" name="end" title="end">
											<span class="fa fa-times"></span>
										</button>
									</div>
								</form>
							</td>
							<td>
								<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' onsubmit="return confirm('Delete package - <?php echo $row['sid']; ?>');">
									<input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
									<div class='btn-group'>
										<a class="btn btn-info" title="edit" href='users-package-edit.php?id=<?php echo $row['id']; ?>'>
											<span class="fa fa-pencil"></span>
										</a>
										<button class="btn btn-danger" type="submit" name="delete" title="delete">
											<span class="fa fa-trash"></span>
										</button>
									</div>
								</form>
							</td>
						</tr>
						<?php
						   }
								  }
								  ?>
					 </tbody>
				  </table>
				</div>
			
			</div>
         </div>
         <!-- /top tiles -->
      </div>


<?php include 'footer.php'; ?>