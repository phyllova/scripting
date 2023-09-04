<?php
session_start();

include "../../config/db.php";
include "../../config/config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;


$email_err = $password_err= "";
$email = $password= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if (empty($_POST["email"])) {
    $email_err = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "Invalid email format"; 
    }
  }
  
  
   if (empty($_POST["password"])) {
    $password_err = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if name only contains letters and whitespace
   
  }
    
		
	$email = $link->real_escape_string($_POST['email']);
	$password = $link->real_escape_string($_POST['password']);
	$ip = $_SERVER['REMOTE_ADDR'];
	
	
	if($email == "" || $password == ""){
		$msg = "Email or Password fields cannot be empty!";
		
	}else {
		$sql=$link->query("SELECT id,username,email, password, 2fa, confirm FROM users WHERE email='$email' AND password= '$password'");
		if($sql->num_rows > 0){
			$data = $sql->fetch_array();
		
				if($data['confirm'] == 0){
					
					$msg = "Please wait for administrator's aproval on your account for activation!";
					
				}else{
                         
					if($data['2fa'] == 1){

header("location:../pages/login.php?email=$email");

					}else {

					if($sql1 = "SELECT * FROM users WHERE email='$email'  AND password='$password'"){

                 $result1 = $link->query($sql1);
                 if(mysqli_num_rows($result1) > 0){
                     $row = mysqli_fetch_array($result1);


	             $_SESSION['email']=$_POST['email'];
	               $_SESSION['username']=$row['username'];
				   $_SESSION['refcode']=$row['refcode'];
				   $_SESSION['referred']=$row['referred'];
				   $_SESSION['uid']=$row['id'];
					$_SESSION['profit']=$row['profit'];
					$_SESSION['refbonus']=$row['refbonus'];
					 $_SESSION['walletbalance']=$row['walletbalance'];
					   $_SESSION['session']=$row['session'];
					   $_SESSION['password']=$row['password'];
					   $_SESSION['verify']=$row['verify'];
					   $_SESSION['package']=$row['package'];
					  
					   $_SESSION['pm']=$row['pm'];
					    $_SESSION['mmd']=$row['mmd'];
					   $_SESSION['eth']=$row['eth'];
					   $_SESSION['btc']=$row['btc'];
					   
					   $_SESSION['2fa']=$row['2fa'];
                     $username= $_SESSION['username'];
					 $emails= $_SESSION['email'];
					 $refcode= $_SESSION['refcode'];
					  $phone= $_SESSION['phone']  = $row['phone'] ;
					   $country= $_SESSION['country'] =  $row['country'];
					    $address= $_SESSION['address'] = $row['address'];
					 
$date = date("Y/m/d");
					header("location:../pages/mypackage.php?Date= $date &username=$username &email=$emails ");
					
					//send email



              require_once "PHPMailer/PHPMailer.php";
              require_once 'PHPMailer/Exception.php';
              
              
              //PHPMailer Object
              $mail = new PHPMailer;
              
              //From email address and name
        $mail->setFrom($emaila);
   $mail->FromName = $name;
              
              //To address and name
              $mail->addAddress($email, $fname);
              $mail->addAddress("$email"); //Recipient name is optional
              
              //Address to which recipient will reply
              
              //Send HTML or Plain Text email
              $mail->isHTML(true);
              
              $mail->Subject = "Account Details";
              
              $mail->Body = '
              
              
               <div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 

<div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">

<div class="be_logo" style="float: left;"> <img src="https://'.$bankurl.'/admin/c2wad/logo/'.$logo.'"> </div>

<div class="be_user" style="float: right"> <p>Dear: '.$username.'</p> </div> 

<div style="clear: both;"></div> 

<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<h1>Thank you for investing on '.$name.'</h1>

</div> </div> 

<div class="be_body" style="padding: 20px;"> <p style="line-height: 25px;"> 
              
              
              
              
              
              Your account was logged in from '. '(IP: '.$ip.') on '.date("F j, Y, g:i a").', if you did not 
              login from this device, contact your account manager to secure your account.
              
        </p>

<div class="be_footer">
<div style="border-bottom: 1px solid #ccc;"></div>


<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<p> Please do not reply to this email. Emails sent to this address will not be answered. 
Copyright ©2023 '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>      
              
              
              ';
              
              if($mail->send()) {
                
                  $msg =  "Message has been sent successfully!";
              }
                             
                         else{
                              $msg = "Something went wrong. Please try again later!";
                          }
                      
                  }else{
                      $msg = "Cannot Send!";
                  }
              }
					}
              }
              
					
					
					
					
				
				 }
			else{
				
				$msg = "Email or Password incorrect!";
			}
		}
		}
			 
		
		
	
	

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



?>
<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Confirmation | Acebarter - Crypto & Real Estates Investment</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="/img/logo/favicon.ico">

		<!-- all css here -->

		<!-- bootstrap v3.3.6 css -->
		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<!-- owl.carousel css -->
		<link rel="stylesheet" href="/css/owl.carousel.css">
		<link rel="stylesheet" href="/css/owl.transitions.css">
       <!-- Animate css -->
        <link rel="stylesheet" href="/css/animate.css">
        <!-- meanmenu css -->
        <link rel="stylesheet" href="/css/meanmenu.min.css">
		<!-- font-awesome css -->
		<link rel="stylesheet" href="/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/themify-icons.css">
		<link rel="stylesheet" href="/css/flaticon.css">
		<!-- magnific css -->
        <link rel="stylesheet" href="/css/magnific.min.css">
		<!-- style css -->
		<link rel="stylesheet" href="/style.css">
		<!-- responsive css -->
		<link rel="stylesheet" href="/css/responsive.css">

		<!-- modernizr css -->
		<script src="/js/vendor/modernizr-2.8.3.min.js"></script>
	</head>
		<body>

		<!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

        <div id="preloader"></div>
        <header class="header-one">
            <!-- Start top bar -->
            <div class="topbar-area fix hidden-xs">
                <div class="container">
                    <div class="row">
                       <div class="col-md-6 col-sm-6">
                           <div class="topbar-left">
                                <ul>
                                    <li><a href="#"><i class="fa fa-envelope"></i> info@acebarter.com</a></li>
                                    <li><a href="#"><i class="fa fa-phone"></i> +1 470-344-4037</a></li>
                                </ul>
							</div>
                        </div>
                        <div class=" col-md-6 col-sm-6">
                            <div class="topbar-right">
                                <div class="top-social">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End top bar -->
            <!-- header-area start -->
            <div id="sticker" class="header-area hidden-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <!-- logo start -->
                                <div class="col-md-3 col-sm-3">
                                    <div class="logo">
                                        <!-- Brand -->
                                        <a class="navbar-brand page-scroll white-logo" href="/index.php">
                                            <img src="/img/logo/logo3.png" alt="">
                                        </a>
                                        <a class="navbar-brand page-scroll black-logo" href="/index.php">
                                            <img src="/img/logo/logo.png" alt="">
                                        </a>
                                    </div>
                                    <!-- logo end -->
                                </div>
                                <div class="col-md-9 col-sm-9">
                                    <div class="header-right-link">
                                        <!-- search option end -->
                                        <a class="s-menu" href="signin.php">Login</a>
                                    </div>
                                    <!-- mainmenu start -->
                                    <nav class="navbar navbar-default">
                                        <div class="collapse navbar-collapse" id="navbar-example">
                                            <div class="main-menu">
                                                <ul class="nav navbar-nav navbar-right">
                                                    <li><a class="pages" href="/index.php">Home</a>

                                                    </li>
                                                    <li><a href="/about.php">About us</a></li>
                                                    <li><a href="/investment.php">Plans</a></li>
																										<li><a href="/faq.php">FAQ</a></li>
                                                    <li><a href="/contact.php">contacts</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                    <!-- mainmenu end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-area end -->
            <!-- mobile-menu-area start -->
            <div class="mobile-menu-area hidden-lg hidden-md hidden-sm">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <div class="logo">
                                    <a href="/index.php"><img src="/img/logo/logo.png" alt="" /></a>
                                </div>
                                <nav id="dropdown">
                                    <ul>
                                        <li><a class="pages" href="/index.php">Home</a>

                                        </li>
                                        <li><a href="/about.php">About us</a></li>
                                        <li><a href="/investment.php">Plans</a></li>
																				<li><a href="/faq.php">FAQ</a></li>
                                        <li><a href="/contact.php">Contacts</a></li>
																				<li><a href="signin.php">Login</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile-menu-area end -->
        </header>
        <!-- header end -->
        <!-- Start breadcumb Area -->
        <div class="page-area">
            <div class="breadcumb-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcrumb text-center">
                            <div class="section-headline white-headline">
                                <h3>Member Area</h3>
                            </div>
                            <ul class="breadcrumb-bg">
                                <li class="home-bread">Signup</li>
                                <li>Complete</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End breadcumb Area -->

		<!-- Start Self-area -->
		<div class="payment-history-area bg-color fix area-padding-2">
            <div class="container">
               <div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-headline text-center">
                            <h3>Thank you for Registering</h3>
                            <p>You're all set. You'll receive an email notification shortly.</p>
                            <br>
                            <a class="s-menu" href="signin.php">Login</a>
                        </div>
					</div>
				</div>
            </div>
        </div>
        <!-- End payment-history area -->
        <!-- End Self-area -->

        <!-- Start Footer Area -->
        <footer class="footer1">
            <div class="footer-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="footer-content logo-footer">
                                <div class="footer-head">
                                    <div class="footer-logo">
                                    	<a class="footer-black-logo" href="#"><img src="/img/logo/logo.png" alt=""></a>
                                    </div>
                                    <p>
                                     We offer real-time price charts, market analysis, and up-to-date news and information to help you stay ahead of the game. Our goal is to empower you with the knowledge and insights necessary to navigate the dynamic world of cryptocurrencies and make smart investments. Join us today and start investing in the future of money.

                                    </p>
                                    <div class="subs-feilds">
                                        <div class="suscribe-input">
                                            <input type="email" class="email form-control width-80" id="sus_email" placeholder="Type Email">
                                            <button type="submit" id="sus_submit" class="add-btn">Subscribe</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end single footer -->
                        <div class="col-md-4 col-sm-3 col-xs-12">
                            <div class="footer-content">
                                <div class="footer-head">
                                    <h4>Services Link</h4>
                                    <ul class="footer-list">
                                        <li><a href="/about.php">About us</a></li>
                                        <li><a href="/investment.php">Services </a></li>
                                        <li><a href="#">Events</a></li>
                                        <li><a href="#">Promotion</a></li>
                                        <li><a href="#">Transition</a></li>
                                        <li><a href="#">Social Media</a></li>
                                    </ul>
                                    <ul class="footer-list hidden-sm">
										<li><a href="/contact.php">Customer Care</a></li>
                                        <li><a href="/contact.php">Live chat</a></li>
                                        <li><a href="#">Notification</a></li>
                                        <li><a href="/privacy.php">Privacy</a></li>
                                        <li><a href="/tos.php">Terms & Condition</a></li>
                                        <li><a href="/contact.php">Contact us </a></li>
									</ul>
                                </div>
                            </div>
                        </div>
                        <!-- end single footer -->
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="footer-content last-content">
                                <div class="footer-head">
                                    <h4>Information</h4>
                                    <div class="footer-contacts">
										<p><span>Tel :</span> +1 470-344-4037</p>
										<p><span>Email :</span> info@acebarter.com</p>
										<p><span>Location :</span> 90 Rockaway Parkway, Brooklyn, NY 11212, United States</p>
									</div>
                                    <div class="footer-icons">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-google"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-pinterest"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-area-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="copyright">
                                <p>
                                    © 2023
                                    <a href="#">Acebarter - Crypto & Real Estates Investment</a> All Rights Reserved
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer area -->

		<!-- all js here -->

		<!-- jquery latest version -->
		<script src="/js/vendor/jquery-1.12.4.min.js"></script>
		<!-- bootstrap js -->
		<script src="/js/bootstrap.min.js"></script>
		<!-- owl.carousel js -->
		<script src="/js/owl.carousel.min.js"></script>
		  <!-- stellar js -->
        <script src="/js/jquery.stellar.min.js"></script>
		<!-- magnific js -->
        <script src="/js/magnific.min.js"></script>
        <!-- wow js -->
        <script src="/js/wow.min.js"></script>
        <!-- meanmenu js -->
        <script src="/js/jquery.meanmenu.js"></script>
		<!-- Form validator js -->
		<script src="/js/form-validator.min.js"></script>
		<!-- plugins js -->
		<script src="/js/plugins.js"></script>
		<!-- main js -->
		<script src="/js/main.js"></script>
	</body>
</html>
