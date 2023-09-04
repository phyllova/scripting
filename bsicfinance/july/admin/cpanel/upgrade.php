<?php

require __dir__ . '/sub-config.php';

include 'inc/for-upgrade.php';

include 'header.php';

?>


   <div class="card">
      <div class="card-header">
            <h5 class="text-center text-md-left mb-0">
				Package Management
			</h5>
		</div>
         <div class="card-body">
            <div class="col-md-12 col-sm-12 col-sx-12">
				
				<?php sysfunc::html_notice( $msg ); ?>
				
               <div class="table-responsive">
                  <table class="display table table-striped"  id="example">
                     <thead>
                        <tr class="info">
                           <th>Name</th>
                           <th>Daily Increase</th>
                           <th>Bonus</th>
                           <th>Status</th>
                           <th>MIN</th>
                           <th>MAX</th>
                           <th>Duration</th>
                           <th>Activate</th>
                           <th>Modify</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
						
							$sql= "SELECT * FROM packages ORDER BY id DESC";
							$result = mysqli_query($link,$sql);
							
							if(mysqli_num_rows($result) > 0){
								while($row = mysqli_fetch_assoc($result)){  
                            
									if(isset($row['verify'])  && $row['verify']==1){
										$msg = 'ID Verified &nbsp;&nbsp;<i style="background-color:green;color:#fff; font-size:20px;" class="fa  fa-check" ></i>';
									}else{
										$msg = 'ID Not verified &nbsp;&nbsp;<i class="fa  fa-times" style=" font-size:20px;color:red"></i>';
									}
								
                        ?>
                        <tr class="primary">
							<td><?php echo $row['pname'];?></td>
							<td><?php echo $row['increase']; ?>%</td>
							<td>$<?php echo $row['bonus'];?></td>
							<td><?php echo empty($row['status']) ? 'inactive' : 'active'; ?></td>
							<td>$<?php echo $row['min_amount'];?></td>
							<td>$<?php echo $row['max_amount'];?></td>
							<td><?php echo $row['duration'];?> days</td>
							<td>
								<form action="upgrade.php" method="post">
									<input type='hidden' name='id' value="<?php echo $row['id']; ?>">
									<div class='btn-group'>
										<button class="btn btn-success" type="submit" name="act" title="active">
											<span class="fa fa-check"></span>
										</button>
										<button class="btn btn-warning" type="submit" name="dact" title="deactive">
											<span class="fa fa-ban"></span>
										</button>
									</div>
								</form>
							</td>
							<td>
								<form action="upgrade.php" method="post" onsubmit="return confirm('Delete package - <?php echo $row['pname']; ?>')">
									<input type='hidden' name='id' value="<?php echo $row['id']; ?>">
									<div class='btn-group'>
										<a href='package2.php?edit=<?php echo $row['id']; ?>' class='btn btn-info' title='edit'>
											<span class='fa fa-edit'></i>
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