<?php

require __dir__ . '/sub-config.php';

include 'inc/for-user-edit.php';

include 'header.php';

?>

   <div class="card">
   
      <div class="card-header">
         <h5 class='mb-0'>USER INFO</h5>
      </div>
	  
      <div class="card-body">
		
		<?php sysfunc::html_notice( $msg, $temp->status ?? null ); ?>

		<?php if( !empty($user) ): ?>

			<div class="">
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">

					<?php
					
						$keys = ['username', 'email', 'password', 'walletbalance', 'refbonus', 'phone', 'address', 'country'];
						$readonly = ['username'];
						
						foreach( $keys as $key ):
							$name = in_array($key, $readonly) ? "readonly" : "name='{$key}'";
					?>
						<div class='form-group'>
							<label class='form-label'>
								<?php echo ucwords($key); ?>
							</label>
							<?php if( $key != 'country' ): ?>
								<input type='text' <?php echo $name; ?> value='<?php echo $user[$key]; ?>' class='form-control'>
							<?php else: ?>
								<select <?php echo $name; ?> class='form-control'>
									<?php 
										foreach( sysfunc::countries() as $key => $value ): 
											$selected = ($key == strtoupper($user['country'])) ? 'selected' : null;
									?>
									<option value='<?php echo $key; ?>' <?php echo $selected; ?>>
										<?php echo $value; ?>
									</option>
									<?php endforeach; ?>
								</select>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
		
					<div class='form-group'>
						<button class='btn btn-info'>
							Update User
						</button>
					</div>
					
				</form>
			</div>
	 
		<?php else: ?>
			
			<div class='border py-5 m-auto mx-md-5'>
				<div class='text-center text-uppercase'>
					<h1>No user data was found</h1>
					<a href='edit.php' class='btn btn-primary'>Back to list</a>
				</div>
			</div>
			
		<?php endif; ?>
        
      </div>
   </div>



<?php include 'footer.php'; ?>