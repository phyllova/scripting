<?php 

class section {
	
	public static $cardType = 0;
	
	public static function Title( $title ) { 
		global $settings;
		$__user = (new user())->info();
?>

	          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper mb-3">
            <div class="row align-items-center">
              <div class="col-md-7">
                <div class="titlemb-30">
                  <h3 class='mb-1'><?php echo $title; ?></h3>
					<div class='row'>
						<div class='col-md-7 '>
							<h5 class="text-gray op-7 mb-2">
								<marquee style="" width="100%" >Thanks for investing in <?php  echo $settings['name']; ?> have a nice day!</marquee>
							</h5>
						</div>
					</div>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-5">
				<div class='input-group'>
					<input type="text" id="myInput" class='form-control bg-light' value="<?php echo user::get($__user, 'reflink'); ?>" readonly="true"/>
					<button class="btn btn-secondary" onclick="myFunction()">
						<i class='fa fa-paste'></i> Copy
					</button>
				</div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->
		
	<?php }
	
	public static function price_widget() {
	?>
		<div class="tradingview-widget-container mb-4">
			<div class="tradingview-widget-container__widget"></div>
			<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
				{
				"symbols": [
				  {
					"title": "S&P 500",
					"proName": "OANDA:SPX500USD"
				  },
				  {
					"title": "Nasdaq 100",
					"proName": "OANDA:NAS100USD"
				  },
				  {
					"title": "EUR/USD",
					"proName": "FX_IDC:EURUSD"
				  },
				  {
					"title": "BTC/USD",
					"proName": "BITSTAMP:BTCUSD"
				  },
				  {
					"title": "ETH/USD",
					"proName": "BITSTAMP:ETHUSD"
				  }
				],
				"colorTheme": "dark",
				"isTransparent": false,
				"displayMode": "adaptive",
				"locale": "en"
				}
			</script>
		</div>
	<?php
	}
	
	public static function translator() { ?>
	
		<div id="google_translate_element" style="margin-left:1%"></div>
		
		<script type="text/javascript">
			function googleTranslateElementInit() {
				new google.translate.TranslateElement({
					pageLanguage: 'en', 
					layout: google.translate.TranslateElement.InlineLayout.SIMPLE, 
					autoDisplay: false
				}, 'google_translate_element');
			};
		</script>
		
		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		
	<?php }
	
	public static function card( $info ) { 
		if( !in_array($info['color'], ['primary', 'secondary', 'danger', 'success', 'warning', 'info', 'dark', 'light', 'white']) ) {
			$color = "color: {$info['color']}";
			$bg_color = "background-color: {$info['color']}";
		} else $color = $bg_color = null;
	?>
		
		<div class="col-sm-6 col-md-4 mb-3" >
	
			<?php if( empty(self::$cardType) ): ?>
		
				<div class="card card-stats card-round">
					<div class="card-body p-4">
						<div class="d-flex align-items-center">
							<div class="fs-28 me-3 text-<?php echo $info['color']; ?>" style='<?php echo $color; ?>'>
								<i class="<?php echo $info['icon']; ?>"></i>
							</div>
							<div class="d-flex align-items-center" >
								<div class="numbers">
									<h4 class="card-title mb-0" >
										<?php echo $info['value']; ?> 
									</h4>
								</div>
							</div>
						</div>
					</div>
					<div class='card-footer py-3 bg-<?php echo $info['color']; ?>' style='<?php echo $bg_color; ?>'>
						<h5 class='text-white text-capitalize'><?php echo $info['title']; ?></h5>
					</div>
				</div>
			
			<?php else: ?>
		
				<div class="icon-card mb-30">
					<div class="icon <?php echo $info['color']; ?>">
						<i class="<?php echo $info['icon']; ?>"></i>
					</div>
					<div class="content">
						<h6 class="mb-10"><?php echo $info['title']; ?></h6>
						<h3 class="text-bold mb-10"><?php echo $info['value']; ?></h3>
						<p class="text-sm text-success d-none">
							<i class="lni lni-arrow-up"></i> +2.00%
							<span class="text-gray">(30 days)</span>
						</p>
					</div>
				</div>
			
			<?php endif; ?>
			  
		</div>
			
	<?php }
	
}