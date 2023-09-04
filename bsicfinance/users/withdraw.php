<?php

require __dir__ . '/sub-config.php';

include 'inc/for-withdraw.php';

include "header.php";
 
?>


<div class="panel-header bg-primary-gradient">

    <?php section::Title("Withdrawal"); ?>
	
    <?php section::price_widget(); ?>
	 
</div>

<div class="page-inner ">
    <div class="row row-card-no-pd mt--2">
        <div class="col-md-12 col-sm-12 col-sx-12">
            <div class="box box-default">
			
                <div class="box-header with-border">
                    <div class="col-xs-12">
                        <div class="card box-default">
						
                            <div class="card-body" style="margin-left:5%">
							
                                <?php sysfunc::html_notice($msg, $temp->status ?? null); ?>
							
                                <div type="button" class="btn btn-info w-100 bg-info p-5 fs-30">
									<b> 
										<i class="fa fa-money" id="icone"></i> 
										Balance: <?php echo number_format($__user['walletbalance'],2);?> USD
									</b>
                                </div>
								
                                <div class='my-3'></div>
								
                                <button type="button" class="btn w-100 btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#btc">
									Request  Withdrawal
                                </button>
								
                            </div>
							
                        </div>
                    </div>
                </div>
				
                <div class="modal modal-success fade" id="btc">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Withdrawal</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
								<div class='alert alert-warning'>
									Please ensure that your <a href='<?php echo sysfunc::url( __users_contents . '/bdetails.php' ); ?>'>wallet detail</a> is up to date before you proceed
								</div>
                                <form class="form-horizontal" action="withdraw.php" method="POST" >
                                    <div class="form-group">
                                        <input type="number" step="0.01" name="usd"  placeholder="Value in USD" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="wallet" id="wallet" class="form-control text-capitalize">
                                            <option value=''>Select Wallet type</option>
											<?php 
												$methods = array(
													"pm" => "Perfect Money",
													"eth" => "Ethereum",
													"btc" => "Bitcoin",
													"usdt" => "USD Tether"
												);
												foreach($methods as $key => $value):
													$addr = $__user[$key];
													if( empty($addr) ) continue;
											?>
												<option value="<?php  echo $addr; ?>" data-mode="<?php echo $value; ?>"> 
													<?php echo ucfirst($key); ?> - <?php  echo $addr; ?>
												</option>
											<?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text"  name="mode" id="mode"  readonly placeholder="wallet type" class="form-control">
                                    </div>
									<div class='text-right'>
										<button type="submit" name="btc" class="btn btn-success">Withdraw</button>
									</div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

				<script>
					(function() {
						var w = document.querySelector('#wallet');
						w.onchange = function() {
							var option = w.children[ w.selectedIndex ];
							document.querySelector('#mode').value = option.dataset.mode;
						};
					})();
				</script>
									
            </div>
        </div>
    </div>
</div>
<?php
    include 'footer.php';
    
    ?>