<?php

require __dir__ . '/sub-config.php';

include 'inc/for-package2.php';

include "header.php";

if( !empty($_GET['edit']) ) {
	$result = $link->query( "SELECT * FROM packages WHERE id = '{$_GET['edit']}'" );
	$package = $result->fetch_assoc();
};

if( empty($package) ) $package = [];

?>

<div class="card">

	<h5 class='card-header text-center text-md-left mb-0'>
		<?php echo empty($package) ? "NEW" : "EDIT"; ?> PACKAGE
	</h5>
 
	 <div class="card-body">
	 
		<?php sysfunc::html_notice($temp->msg, $temp->status ?? null); ?>
		
		<form class="form-horizontal" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" >
		
			<legend><?php echo empty($package) ? "Create New" : "Editing"; ?> Package</legend>
		
			<hr/>
			
			<input type="hidden" name="email"  value="<?php echo $temp->admin['email'];?>" class="form-control">
			
			<div class="form-group">
				<label class='form-label'>Package Name</label>
				<input type="text" name="pname" placeholder="Package Name..."   class="form-control" required value="<?php echo $package['pname'] ?? null; ?>">
			</div>
			
			<div class="form-group">
				<label class='form-label'>Daily Percentage Increase (%)</label>
				<input type="number" step='0.01'  name="increase" placeholder="% increase..."   class="form-control" required value="<?php echo $package['increase'] ?? null; ?>">
			</div>
			
			<div class="form-group">
				<label class='form-label'>Package Purchase Bonus (USD)</label>
				<input type="number" step='0.01'  name="bonus" placeholder="$ Bonus..."   class="form-control" required value="<?php echo $package['bonus'] ?? null; ?>">
			</div>
			
			<div class="form-group row">
				<div class='col-md-6'>
					<label class='form-label'>MIN Investment (USD)</label>
					<input type="number" step='0.01'  name="min_amount" placeholder="$ From..."   class="form-control" required value="<?php echo $package['min_amount'] ?? null; ?>">
				</div>
			</div>
			
			<div class="form-group row">
				<div class='col-md-6'>
					<label class='form-label'>MAX Investment (USD)</label>
					<input type="number" step='0.01'  name="max_amount" placeholder="$ To..."   class="form-control" required value='<?php echo $package['max_amount'] ?? null; ?>'>
				</div>
			</div>
			
			<div class="form-group">
				<label class='form-label'>Duration (days)</label>
				<input type="number" name="duration" placeholder="x days..."   class="form-control" required value='<?php echo $package['duration'] ?? null; ?>'>
			</div>
			
			<input type='hidden' name='sid' value='<?php echo $package['sid'] ?? null; ?>'>
			
			<hr/>
			
			<button type="submit" class="btn btn-info" name="package2" >
				<?php echo empty($package) ? "Create" : "Update"; ?> Package 
			</button>
		
		</form>
	
	</div>
</div>

<?php include 'footer.php'; ?>