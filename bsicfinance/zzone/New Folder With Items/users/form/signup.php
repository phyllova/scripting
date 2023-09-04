<?php
// Include config file
include "../../config/db.php";
include "../../config/config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


 
// Define variables and initialize with empty values
$username = $email = $password = $cpassword = $address = $phone = $country = "";
$username_err = $email_err = $password_err = $cpassword_err =  $address_err = $phone_err = $country_err =  "";



if(isset($_GET['refcode'])){

    $refcode = $_GET['refcode'];

}else {
    $refcode='';
}

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(isset($_POST['terms'])){
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }


      // Validate email
      if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["cpassword"]))){
        $cpassword_err = "Please confirm password.";     
    } else{
        $cpassword = trim($_POST["cpassword"]);
        if(empty($password_err) && ($password != $cpassword)){
            $cpassword_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($email_err) && empty($password_err) && empty($cpassword_err)){
        
        
         $phone= $_POST['phone'];
          $country = $_POST['country'];
           $address = $_POST['address'];
        
            $referred = $_POST['referred'];
            $bonus = $_POST['bonus'];
        $token ='kllcabcdg19etsfjhdshdsh35678gwyjerehuhb/>()[]{}|\dTSGSAWQUJHDCSMNBVCBNRTPZXMCBVN1234567890';
            $token = str_shuffle($token);
             $token= substr($token,0, 10);



             $refcode ='kllcabcdg19etsfjhdshdsh35678gwyjerehuhbdTSGSAWQUJHDCSMNBVCBNRTPZXMCBVN1234567890';
                $refcode = str_shuffle($refcode);
                 $refcode= substr($refcode,0, 10);
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, email, password, token, refcode, referred, walletbalance, phone, address, country ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssss", $param_username, $param_email, $param_password, $param_token, $param_refcode, $param_referred, $param_bonus, $param_phone, $param_address, $param_country );
            
            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = $password;
             $param_token = $token;
            $param_refcode = $refcode;
            $param_referred = $referred;
            $param_bonus = $bonus;
            $param_phone  = $phone;
            $param_address = $address;
            $param_country = $country;
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
              
require_once "PHPMailer/PHPMailer.php";
require_once 'PHPMailer/Exception.php';


//PHPMailer Object
$mail = new PHPMailer;

    //From email address and name
        $mail->setFrom($emaila);
   $mail->FromName = $name;
              
 
$mail->addAddress("$email"); //Recipient name is optional

//Address to which recipient will reply

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Email Verification";
$mail->Body = '
              
               <div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 

<div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">


<div class="be_logo" style="float: left;"> <img src="https://<?php echo $bankurl;?>/admin/c2wad/logo/<?php echo $logo;?>" alt="navbar brand" 
					style="height:40px;width:100px; margin-top:15px;"> </div>

<div class="be_user" style="float: right"> <p>Dear: '.$username.'</p> </div> 

<div style="clear: both;"></div> 

<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<h1>Thank you for Registering on  '.$name.'</h1>

</div> </div> 

<div class="be_body" style="padding: 20px;"> <p style="line-height: 25px;"> 
You will receive a notification once your account has been activated!</p>
</br>

        </p>

<div class="be_footer">
<div style="border-bottom: 1px solid #ccc;"></div>


<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<p> Please do not reply to this email. Emails sent to this address will not be answered. 
Copyright ©2023 '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>      
              


';


if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    $msg =  "We have sent a message to your Email";
}
               
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}else{
    
     $msg =  "You have to accept terms and condition!";
}
}

?>  


<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Signup | Acebarter - Crypto & Real Estates Investment</title>
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
                                <h3>Registration</h3>
                            </div>
                            <ul class="breadcrumb-bg">
                                <li class="home-bread">Home</li>
                                <li>Registration</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End breadcumb Area -->

		<!-- Start Self-area -->
		 <div class="self-area area-padding">
            <div class="container">
                <div class="row">
                    <!-- column end -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        
                        
                    <div class="registration">
						
						
                        <div class="self-content">
						    <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br></br>";  ?>
						
						
                        <div class="login-form">
                            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                                <input type="hidden" name="bonus"   value="<?php echo $rb;?>">
                            
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input id="inp" type="text" class="form-control" name="username" placeholder="Username" required data-error="Please enter your username" value="<?php echo $username; ?>">
                                    <span class="help-block"><?php echo $username_err; ?></span>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input id="inp" type="email" name="email" class="form-control" placeholder="E-mail" required data-error="Please enter your email" value="<?php echo $email; ?>">
                                    <span class="help-block"><?php echo $email_err; ?></span>
                                </div>
    
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input id="inp" type="password" class="form-control" name="password" placeholder="Password" required data-error="Please enter your password"  value="<?php echo $password; ?>">
                                    <span class="help-block"><?php echo $password_err; ?></span>
                                </div>
    															   
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input id="inp" type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required data-error="Please confirm your password" value="<?php echo $cpassword; ?>">
                                </div>
    
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input id="inp" type="text" name="phone" class="form-control" placeholder="Phone Number" required data-error="Please enter your phone number" value="<?php echo $phone; ?>">
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <select class="form-control" name="country" required data-error="Please select your country">
                                        <option>Select country</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Aland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia</option>
                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, Democratic Republic of the Congo</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Cote D'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curacao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and Mcdonald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran, Islamic Republic of</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="XK">Kosovo</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libyan Arab Jamahiriya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="AN">Netherlands Antilles</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory, Occupied</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Reunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthelemy</option>
                                        <option value="SH">Saint Helena</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="CS">Serbia and Montenegro</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.s.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>

    							<div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                    <input id="inp" class="form-control" placeholder="Address" type="text" name="address" required data-error="Please enter your address" value="<?php echo $address; ?>"> 
                                    <span class="help-block"><?php echo $cpassword_err; ?></span>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                    <input id="inp" type="hidden" name="referred"  readonly value="<?php echo $refcode; ?>">
                                </div>
    
    							<div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                    <label >Accept terms</label>
                                    <input id="inp" type="checkbox"  name="terms" required data-error="Please accept terms" value="" >
                                </div>
    
    							<div class="col-md-12 col-sm-12 col-xs-12 text-center">
    								<button type="submit" name="submit" id="submit" value="SIGN Up" class="add-btn contact-btn">Signup</button>
    											<div class="clearfix"></div>
    							</div>

                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                    <br>
                                  <p>By clicking Signup, you agree to our <a href="/tos.php">terms of use</a></p>
                                  <h6>Already a member &nbsp; <a href="signin.php"> LOGIN</a><h6>
    
                                </div>
						    </form>
						</div>
                    </div>
                </div>
                <!-- column end -->
            </div>
        </div>
    </div>
    <!-- End Self-area -->
</div>

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
        <!-- countries js -->
        <!-- <script type= "text/javascript" src = "/js/countries.js"></script> -->
	</body>
</html>