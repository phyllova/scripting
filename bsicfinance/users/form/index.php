<?php

require __dir__ . '/sub-config.php';
require __dir__ . '/control/for-signin.php';

### start HTML 

require __dir__ . '/form-header.php';

?>
	
<section class="bg-light">
	<div class="container-fluid h-custom py-5">
		<div class="row">
			
			<div class='col-xl-4 col-lg-5 col-md-7 m-auto'>
						
					<div class="mb-4 text-center">
						
						<h3 align="center" class='mb-3'>
							<?php echo $settings['name']; ?>
						</h3>

						<img src="<?php echo $settings['logourl']; ?>" class="img-fluid" alt="Site Icon">
					</div>


					<div class="my-4">
						<div class='card'>
							<div class='card-body'>

								<?php sysfunc::html_notice( $temp->msg ); ?>
								
								<form action="<?php echo sysfunc::sanitize_input($_SERVER["PHP_SELF"]);?>"  method="POST" name="form1" id="form1">

									<div class='mb-4'>

										<!-- Email input -->
										<div class="form-outline mb-3">
											<label class="form-label text-muted" for="form3Example3">Email address</label>
											<input type="email" type="email" name="email" value="<?php echo $email; ?>" class="form-control form-control-lg" placeholder="Enter a valid email address" />
											<span class="small help-block text-danger"><?php echo $email_err; ?></span>				  
										</div>

										<!-- Password input -->
										<div class="form-outline mb-3">
											<label class="form-label text-muted" for="form3Example4">Password</label>
											<input type="password" name="password" class="form-control form-control-lg" placeholder="Enter password" />
											<span class="help-block small text-danger mt-1"><?php echo $password_err; ?></span>
										</div>
					
										<div class='form-check'>
											<input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
											<label class="form-check-label" for="form2Example3">
												Remember me
											</label>
										</div>
										
										<div class="text-center text-lg-start mt-4 pt-2">
											<input name="submit" type="submit" class="btn btn-success btn-block" onclick="return validate();" value="Submit" class="button1">
										</div>
										
									</div>
								
								</form>

								<div class="d-flex justify-content-between align-items-center my-5">
									<!-- Checkbox -->
									<p class="small fw-bold mb-0">
										Become a Share Holder?  <a href="<?php echo sysfunc::url( __users_register_page ); ?>" class="link-danger">Register</a>
									</p>
									<a href="<?php echo sysfunc::url( __users_reset_password_page ); ?>" class="text-body small">Forgot password?</a>
								</div>
								
							</div>
						</div>
					</div>

					
					<div class="p-3 text-center bg-primary rounded">
						<!-- Copyright -->
						<div class="text-white mb-md-0">
							© <?php echo date('Y'); ?> - All Rights Reserved
						</div>
					</div>
					
			</div>

		</div>
	</div>
</section>

<?php include __dir__ . '/form-footer.php'; ?>