<?php

require __dir__ . '/sub-config.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) include "inc/for-deposit.php";

include "header.php";

/*
$rates = json_encode((new forex())->export_rates());
$temp->HTMLFooter[] = "<script>var rates = '{$rates}';</script>";
*/

?>

<div class="panel-header bg-primary-gradient">

	<?php section::title( "Deposit" ); ?>
	
    <?php section::price_widget(); ?>
	
</div>


<div class="my-4 mx-1 mx-sm-3">
	
	<div class="row">
	
		<?php
			$sql = "SELECT * FROM pmethod";
			$result = mysqli_query($link, $sql);
			
			if(mysqli_num_rows($result)) {
				while($row = mysqli_fetch_assoc($result)) {
		?>
		
		<div class="col-lg-6 mb-4">
		
			<div class='card'>
				<div class='card-body'>
				
					<h5 class="mb-3 text-right">
						<?php echo strtoupper($row['pmethod']); ?>
					</h5>
					
					<div class='mb-2 input-group'>
						<input type="text" class="form-control" value="<?php echo $row['details']?>"  id="<?php echo $row['pmethod']?>" readonly>
						<button data-copy="#<?php echo $row['pmethod'];?>" class="btn btn-info px-3">
							<i class='fa fa-paste'></i>
						</button>
					</div>
					
					<form action="deposit.php" method="POST"  enctype="multipart/form-data">

						<div class="numbers">
							
							<?php 
								if( isset($temp->error) && ($row['pmethod'] == $temp->mode) ) {
									sysfunc::html_notice( $temp->error, $temp->status );
								};
							?>
							
							<div class="mb-2">
								<input type="text" name="btctnx" placeholder="Transaction ID" class='form-control' required>
							</div>
							
							<div class="mb-3">
								<input type="text" name="usd" placeholder="USD Amount" class='form-control' pattern="\s*[0-9.]+\s*" required>
							</div>
							
							<div class="mb-2"> 
								<label>Upload Payment Proof</label>
								<input type="file" name="fileToUpload" id="fileToUpload" class="form-control col-md-7 col-xs-12" accept='image/*' >
							</div>
							
							<input type="hidden" name="mode" value="<?php echo $row['pmethod'];?>" class='form-control' readonly>
							
							<div class="">
								<button class="btn btn-primary" type="submit">
									Deposit
								</button>
							</div>
							
						</div>
									
					</form>
					
				</div>
			</div>
			
		</div>
		
		<?php }; /*:while*/ }; /*:if*/ ?>
		
	</div>
	<!-- </div>  -->

</div>
  
<?php include 'footer.php'; ?>  
