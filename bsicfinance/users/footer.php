		</div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->

      <!-- ========== footer start =========== -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 order-last order-md-first">
              <div class="copyright text-center text-md-start">
                <p class="text-sm">
                  Copyright
                  <a
                    href="<?php echo sysfunc::url( __users_contents ); ?>"
                    rel="nofollow"
                    target="_blank"
                  >
                    <?php echo $settings['name']; ?>
                  </a>
                </p>
              </div>
            </div>
          </div>
          <!-- end row -->
        </div>
        <!-- end container -->
      </footer>
      <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

	<?php /*
				</div> <!-- content -->
			</div> <!-- main-panel -->
		</div> <!-- classic grid -->
	</div> <!-- wrapper -->
	
	<footer class="footer">
		<div class="container-fluid">
			<nav class="pull-left">
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link" >
							
						</a>
					</li>
					
			</nav>
			<div class="copyright ml-auto">
			&copy <?php echo date('Y');?>, All Rights Reserved </i>  <a ><?php echo $settings['name']; ?></a>
			</div>				
		</div>
	</footer>
	
	*/ ?>
	
	<script>  
		function myFunction() {
		  /* Get the text field */
		  var copyText = document.getElementById("myInput");

		  /* Select the text field */
		  copyText.select();

		  /* Copy the text inside the text field */
		  document.execCommand("copy");

		  /* Alert the copied text */
		  alert("Copied the text: " + copyText.value);
		}
	</script>


	<?php require_once __core_views . '/foot-tags.php'; ?>

</body>
</html>