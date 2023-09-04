<!DOCTYPE html>
<html lang="en">
<head>
	<?php require __core_views . '/head-tags.php'; ?>
</head>

<body class="">

	    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
	
		<div class="navbar-logo">
			<a href="index.php">
				<img src="<?php echo $settings['logourl']; ?>" alt="logo" />
			</a>
		</div>
		
      <nav class="sidebar-nav">
		
		<?php require __DIR__ . '/menu-order.php'; ?>
		
        <ul>
			<?php
				$loop = 0;
				$menufy->enlist(null, function($data, $name, $menu) use(&$loop) {
					
					$loop++;
					
					$filename = basename($_SERVER['SCRIPT_NAME']);
					
					$class = ($filename == $data['link']) ? 'active' : '';
					
					$show_child = false;
					
					if( !empty($data['submenu']) ) {
						
						$class .=  ' nav-item-has-children';
						$child_id = "menu-{$name}";
						$data['link'] = "#{$child_id}";
						
						$anchor_attr = 'class="collapsed"
							data-bs-toggle="collapse"
							data-bs-target="' . $data['link'] . '"
							aria-controls="' . $child_id . '"
							aria-expanded="false"
							aria-label="Toggle navigation"';
							
						foreach( $data['submenu'] as $array ) {
							if( $array['link'] == $filename ) {
								$class .= ' active';
								$show_child = true;
							};
						}
							
					} else $child_id = $anchor_attr = null;
					
					
					ob_start();
					
			?>
			
			<li class="nav-item <?php echo $class; ?>">
				<a href="<?php echo $data['link']; ?>" <?php echo $anchor_attr; ?>>
					<span class="icon">
						<i class="<?php echo $data['icon']; ?>"></i>
					</span>
					<span class="text"><?php echo ucwords($data['label']); ?></span>
				</a>
				<?php if( !empty($data['submenu']) ): ?>
					<ul id="<?php echo $child_id; ?>" class="collapse dropdown-nav <?php if( $show_child ) echo 'show'; ?>">
						<?php $menu->enlist($data['submenu'], function($data, $name) use($filename) { ?>
							<li>
								<a href="<?php echo $data['link']; ?>" class="<?php if( $filename == $data['link'] ) echo 'active'; ?>"> 
									<?php echo ucwords($data['label']); ?> 
								</a>
							</li>
						<?php }); ?>
					</ul>
				<?php endif; ?>
			</li>
			
			<?php if( is_int( $loop / 2 ) ): ?>
				<span class="divider"><hr /></span>
			<?php endif; ?>
			
			<?php 
				
					$menu_item = ob_get_clean();
					return $menu_item;
				}); 
				
			?>
			
    </aside>
	
    <div class="overlay"></div>
	
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
      <header class="header">
        <div class="container-fluid">
          <div class="row">
		  
            <div class="col-lg-5 col-md-5 col-6">
              <div class="header-left d-flex align-items-center">
                <div class="menu-toggle-btn mr-20">
                  <button id="menu-toggle" class="main-btn primary-btn btn-hover rounded-1">
                    <i class="lni lni-chevron-left"></i> Menu
                  </button>
                </div>
                <div class="header-search d-none d-sm-flex">
					<?php section::translator(); ?>
                </div>
              </div>
            </div>
			
            <div class="col-lg-7 col-md-7 col-6">
              <div class="header-right">
                <!-- profile start -->
                <div class="profile-box ml-15">
                  <button
                    class="dropdown-toggle bg-transparent border-0"
                    type="button"
                    id="profile"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <div class="profile-info">
                      <div class="info">
                        <h6><?php echo $__user['username']; ?></h6>
                        <div class="image shadow-none">
                          <img src="<?php echo $the_user_image; ?>" alt="" />
                          <span class="status"></span>
                        </div>
                      </div>
                    </div>
                    <i class="lni lni-chevron-down"></i>
                  </button>
                  <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="profile"
                  >
                    <li>
                      <a href="update.php">
                        <i class="lni lni-user"></i> View Profile
                      </a>
                    </li>
                    <li>
                      <a href="read.php"> 
						<i class="lni lni-inbox"></i> Messages 
					  </a>
                    </li>
                    <li>
                      <a href="mypackage.php"> <i class="lni lni-gift"></i> My Packages </a>
                    </li>
                    <li>
                      <a href="log-out.php"> <i class="lni lni-exit"></i> Sign Out </a>
                    </li>
                  </ul>
                </div>
                <!-- profile end -->
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- ========== header end ========== -->

      <!-- ========== section start ========== -->
      <section class="section">
        <div class="container-fluid py-4">
		
			
        
	<?PHP /* 
	<div class="wrapper static-sidebar">

		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="purple">
				<a href="index.php" class="logo">
					<img src="<?php echo $settings['logourl']; ?>" alt="navbar brand" class="navbar-brand" style="height:40px;width:100px; margin-top:7px; border-radius:5%">
				</a> 
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more">
					<i class="fa fa-cog"></i>
				</button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->
			
			<!-- Navbar Header -->			      
			<nav class="navbar navbar-header navbar-expand-lg " data-background-color="purple">
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li>
							<div id="google_translate_element" style="margin-left:1%"></div>
							<script type="text/javascript">
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
								<img src="<?php echo empty($__user['image']) ? 'images/man.png' : "images/profile/{$__user['image']}"; ?>" alt="..." class="avatar-img rounded-circle">
							</div>
							<div class="info">
								<a  href="" >
									<span>
										<?php echo $__user['username'];;?>
										<span class="user-level"><?php echo $__user['email']; ?></span>
									</span>
								</a>
								<div class="clearfix"></div>
							</div>
						</div>
						<ul class="nav nav-secondary">
							<li class="nav-item active submenu">
								<a  href="index.php" >
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
											<a href="update.php">
											<span class=""><i class="fas fa-user"></i> Update Account</span>
											</a>
										</li>
										<li>
											<a href="security.php">
											<span class=""><i class="fas fa-lock"></i> Security</span>
											</a>
										</li>
										<li>
											<a href="bdetails.php">
											<span class=""><i class="fas fa-cog"></i> Wallet Details</span>
											</a>
										</li>
										<li>
											<a href="verify.php">
											<span class=""><i class="fas fa-users"></i> Verify Account</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="nav-item active submenu">
								<a  href="withdraw.php">
									<i class="fas fa-th-list"></i>
									<p>Withdrawal</p>
								</a>
							</li>
							<li class="nav-item active submenu">
								<a  href="deposit.php">
									<i class="fas fa-th-list"></i>
									<p>Deposit</p>
								</a>
							</li>
							<li class="nav-item active submenu">
								<a  href="mypackage.php">
									<i class="fas fa-gift"></i>
									<p>My Package</p>
								</a>
							</li>
							<li class="nav-item active submenu">
								<a  href="investment.php">
									<i class="fas fa-gift"></i>
									<p>Investment Packages</p>
								</a>
							</li>
							<li class="nav-item active submenu">
								<a  href="transaction_log.php">
									<i class="fas fa-table"></i>
									<p>Transaction Logs</p>
								</a>
							</li>
							<li class="nav-item active submenu">
								<a  href="downlines.php">
									<i class="fa fa-users"></i>
									<p>My Downlines</p>
								</a>
							</li>
							<li class="nav-item active submenu">
								<a href="read.php">
									<i class="fas fa-book"></i>
									<p>Read Message</p>
								</a>
							</li>
							<li class="nav-item active submenu">
								<a href="message.php">
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
				 
	*/ ?>	 
		

  
 