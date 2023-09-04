<?php

require __dir__ . '/sub-config.php';
require __dir__ . '/control/for-reset.php';

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
								
								<div class="login-form">
									<form action="<?php echo sysfunc::sanitize_input($_SERVER["PHP_SELF"]);?>" method="POST">
										<input placeholder="Enter your email" id="inp" type="email" name="email" class='form-control form-control-lg'>
										<span class="help-block small text-danger"><?php echo $email_err ?? null; ?></span>
										</br>
										<div class="tp">
											<input type="submit" name="submit" value="Reset" class='btn btn-success btn-block'>
										</div>
									</form>
								</div>

								<div class="my-4">
									<!-- Checkbox -->
									<p class="small fw-bold mt-2 pt-1 mb-0 text-center">
										Back to <a href="<?php echo sysfunc::url( __users_login_page ); ?>" class="link-danger">Login</a>
									</p>
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

<?php require __dir__ . '/form-footer.php'; ?>