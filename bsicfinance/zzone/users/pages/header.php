<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo $title ;?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../logo/log.jpg" style="border-radius:50%;" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>
<body>







	<div class="wrapper static-sidebar">


		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="030d40">
				
				<a href="index.php" class="logo">
				
					<img src="https://<?php echo $bankurl;?>/admin/c2wad/logo/<?php echo $logo;?>" alt="navbar brand" class="navbar-brand" style="height:40px;width:100px; margin-top:7px; border-radius:5%">
					
				</a> 
				
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-cog"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			
            
            
            
            
            
            
            
            <!-- Navbar Header -->			      
            
            <nav class="navbar navbar-header navbar-expand-lg " data-background-color="030d40">
				
				<div class="container-fluid">
					


					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
					
						
						<li>
<div id="google_translate_element" style="margin-left:1%">

</div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</li>
					
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>









		<div class="classic-grid" >
			<!-- Sidebar -->
			<div class="sidebar sidebar-style-2" >			
				<div class="sidebar-wrapper scrollbar scrollbar-inner">
					<div class="sidebar-content">
						<div class="user">
							<div class="avatar-sm float-left mr-2">
								<img src="<?php echo 'man.png';?>" alt="..." class="avatar-img rounded-circle">
							</div>



							<div class="info">
								<a  href="" >
									<span>
									<?php echo $_SESSION['username'];;?>
										<span class="user-level"><?php echo $email;?></span>
									
									</span>
								</a>
								<div class="clearfix"></div>

								
							</div>
						</div>
						<ul class="nav nav-secondary">
							<li class="nav-item active submenu">
								<a  href="index.php?username=<?php  echo $_SESSION['username']?>&email= <?php  echo $_SESSION['email']?>" >
									<i class="fas fa-home"></i>
									<p>Home</p>
								
								</a>
								
							</li>
							


							<li class="nav-item active submenu">
								<a  href="log-out.php" >
									<i class="fas fa-user"></i>
									<p>Log-Out</p>
								
								</a>
								
							</li>
							


							<li class="nav-item active submenu">
								<a data-toggle="collapse"  href="#base">
									<i class="fas fa-user"></i>
									<p>My Profile</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="base">
									<ul class="nav nav-collapse">
										<li>
											<a href="update.php?&username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>">
												<span class=""><i class="fas fa-user"></i> Update Account</span>
											</a>
										</li>
										<li>
											<a href="security.php?&username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>">
												<span class=""><i class="fas fa-lock"></i> Security</span>
											</a>
										</li>
										

										<li>
											<a href="bdetails.php?&username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>">
												<span class=""><i class="fas fa-cog"></i> Wallet Details</span>
											</a>
										</li>


										<li>
											<a href="verify.php?&username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>">
												<span class=""><i class="fas fa-users"></i> Verify Account</span>
											</a>
										</li>
										
										
										
									</ul>
								</div>
							</li>



							<li class="nav-item active submenu">
							<a  href="withdraw.php?&username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>">
								<i class="fas fa-th-list"></i>
								<p>Withdrawal</p>
								
							</a>
								</li>



								<li class="nav-item active submenu">
							<a  href="deposit.php?&username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>">
								<i class="fas fa-th-list"></i>
								<p>Deposit</p>
								
							</a>
								</li>

                        <li class="nav-item active submenu">
								<a  href="mypackage.php?Date=<?php  echo date("Y/m/d");?>&username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>">
									<i class="fas fa-gift"></i>
									<p>My Package</p>
								
								</a>
								
							</li>




							<li class="nav-item active submenu">
								<a  href="investment.php?&username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>">
									<i class="fas fa-gift"></i>
									<p>Investment Packages</p>
								
								</a>
								
							</li>




							<li class="nav-item active submenu">
								<a  href="transaction_log.php?&username=<?php  echo $_SESSION['username']?>&email=<?php  echo $_SESSION['email']?>">
									<i class="fas fa-table"></i>
									<p>Transaction Logs</p>
									
								</a>
								</li>


                           



                            <li class="nav-item active submenu">
								<a  href="downlines.php?&refcode=<?php  echo $_SESSION['refcode']?>&email=<?php  echo $_SESSION['email']?>">
									<i class="fa fa-users"></i>
									<p>My Downlines</p>
									
								</a>
								
							</li>



							<li class="nav-item active submenu">
								<a href="read.php?&refcode=<?php  echo $_SESSION['refcode']?>&email=<?php  echo $_SESSION['email']?>"><i class="fas fa-book"></i>
									<p>Read Message</p>
								
								</a>
							</li>
					
							<li class="nav-item active submenu">
								<a href="message.php?&refcode=<?php  echo $_SESSION['refcode']?>&email=<?php  echo $_SESSION['email']?>">
									<i class="fas fa-book"></i>
									<p>Ticket</p>
								
								</a>
							</li>



							
					



						</ul>
					</div>
				</div>
			</div>
			<!-- End Sidebar -->
            <div class="main-panel">
				<div class="content">