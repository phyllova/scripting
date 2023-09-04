<?php

require __dir__ . '/sub-config.php';
require __dir__ . '/control/for-signup.php';

### start HTML 

require __dir__ . '/form-header.php';

?> 

<section class="bg-light">
	<div class="container-fluid h-custom py-5">
		<div class="row d-flex justify-content-center h-100">
			<div class='m-auto col-xl-5 col-lg-6 col-md-8 m-auto'>
			
				<div class="mb-4 text-center">

					<h3 align="center">
						<?php echo $settings['name']; ?>
					</h3>

					<img src="<?php echo $settings['logourl']; ?>" class="img-fluid" alt="Sample image">
				</div>

				<div class="card mb-4">
					<div class='card-body'>
						
						<?php sysfunc::html_notice( $temp->msg ); ?>
					
						<form  action="<?php echo sysfunc::sanitize_input($_SERVER["PHP_SELF"]);?>" method="POST">
							
							<div class="form-outline mb-3">
								<label class='form-label text-muted'>Username</label>
								<input  class="form-control " id="inp" type="text" name="username" placeholder="Username"  value="<?php echo $username; ?>"> 
								<span class="help-block text-danger small"><?php echo $username_err; ?></span>
							</div>
							
							<div class="form-outline mb-3">
								<label class='form-label text-muted'>Email</label>
								<input class="form-control " id="inp" type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
								<span class="help-block text-danger small"><?php echo $email_err; ?></span>
							</div>  

							<input type="hidden" name="bonus"   value="<?php echo $rb;?>">

							<div class="form-outline mb-3">
								<label class='form-label text-muted'>Password</label>
								<input class="form-control " id="inp" type="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
								<span class="help-block text-danger small"><?php echo $password_err; ?></span>
							</div>

							<div class="form-outline mb-3">
								<label class='form-label text-muted'>Confirm Password</label>
								<input class="form-control " id="inp" type="password" name="cpassword" placeholder="Confirm Password" value="<?php echo $cpassword; ?>">
							</div>		
							
							<div class="form-outline mb-3">
								<label class='form-label text-muted'>Phone</label>
								<input class="form-control " id="inp"  placeholder="Phone Number" type="text" name="phone"   value="<?php echo $phone; ?>">
							</div>        

							<div class="form-outline mb-3">
								<label class='form-label text-muted'>Country</label>
								<select class="form-control " name="country" required>
									<option value="">~ select ~</option>
									<?php foreach( sysfunc::countries() as $key => $country ): ?>
									<option value="<?php echo $key; ?>"><?php echo $country; ?></option>
									<?php endforeach; ?>
								</select>
							</div>                                                      

							<div class="form-outline mb-3">
								<label class='form-label text-muted'>Address</label>
								<input class="form-control " id="inp"  placeholder="Address" type="text" name="address"   value="<?php echo $address; ?>">
								<span class="help-block text-danger small"><?php echo $address_err; ?></span>
							</div>   
							
							<div class="form-check mb-3">
								<input class="form-control " id="inp" type="hidden" name="referred"  readonly value="<?php echo $refcode; ?>">
								<input id="inp" type="checkbox"  name="terms"  value="" class='form-check-input' >
								<label class='form-check-label'>I accept the <a href='javascript:void(0)'>Terms Of Service</a></label>
								</br>      
							</div>

							<div class="text-center text-lg-start mt-4 pt-2">
								<button type="submit" name="submit" class="btn btn-success btn-block" style="padding-left: 2.5rem; padding-right: 2.5rem;">
									Register
								</button>
							</div>

						</form>

						</br>
					
						<p class="small fw-bold mt-2 pt-1 text-center">
							Already a Share Holder? <a href="<?php echo sysfunc::url( __users_login_page ); ?>"class="link-danger">Sign In</a>
						</p>
					
					</div>
				</div>

				<div  class="text-center bg-primary p-3 rounded">
					<div class="text-white mb-3 mb-md-0">
						©  <?php echo date('Y'); ?> - All Rights Reserved
					</div>
				</div>
				
			</div>
		</div>
	</div>

</section>

<?php require __dir__ . '/form-footer.php'; ?>
