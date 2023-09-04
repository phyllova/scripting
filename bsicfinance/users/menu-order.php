<?php 

$menufy = new menufy();

$menufy->add("home", array(
	"link" => "index.php",
	"label" => "home",
	"icon" => "fa fa-home"
));

$menufy->add("logout", array(
	"link" => "log-out.php",
	"label" => "logout",
	"icon" => "fa fa-sign-out"
));

$menufy->add("profile", array(
	"link" => "#",
	"label" => "profile",
	"icon" => "fa fa-user-circle"
));

	$menufy->add_submenu('profile', null, array(
		"label" => "update account",
		"link" => "update.php"
	));

	$menufy->add_submenu('profile', null, array(
		"label" => "security",
		"link" => "security.php"
	));

	$menufy->add_submenu('profile', null, array(
		"label" => "wallet details",
		"link" => "bdetails.php"
	));

	$menufy->add_submenu('profile', null, array(
		"label" => "verify account",
		"link" => "verify.php"
	));
	
$menufy->add("finance", array(
	"label" => "Finance",
	"link" => '#',
	"icon" => "fa fa-money"
));

	$menufy->add_submenu('finance', null, array(
		"label" => "withdrawal",
		"link" => "withdraw.php"
	));

	$menufy->add_submenu('finance', null, array(
		"label" => "deposit",
		"link" => "deposit.php"
	));

	$menufy->add_submenu('finance', null, array(
		"label" => "transaction logs",
		"link" => "transaction_log.php"
	));
	
$menufy->add("package", array(
	"label" => "Packages",
	"link" => '#',
	"icon" => "fa fa-gift"
));

	$menufy->add_submenu('package', null, array(
		"label" => "my package",
		"link" => "mypackage.php"
	));

	$menufy->add_submenu('package', null, array(
		"label" => "investment packages",
		"link" => "investment.php"
	));

	$menufy->add_submenu('package', null, array(
		"label" => "downlines",
		"link" => "downlines.php"
	));
	
$menufy->add("support", array(
	"label" => "support",
	"link" => '#',
	"icon" => "fa fa-question-circle"
));

	$menufy->add_submenu('support', null, array(
		"label" => "Read Message",
		"link" => "read.php"
	));

	$menufy->add_submenu('support', null, array(
		"label" => "ticket",
		"link" => "message.php"
	));
