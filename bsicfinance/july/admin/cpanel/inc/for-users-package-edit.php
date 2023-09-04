<?php

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	
	$_POST = sysfunc::sanitize_input($_POST, true);
	
	$good = "<i class='fa fa-check-circle text-success mr-1'></i>";
	$bad = "<i class='fa fa-times text-danger mr-1'></i>";
	
	$INV_SQL = sysfunc::mysql_update_str("investments", $_POST['package'], $_POST['id'], 'id');
	$status = $link->query( $INV_SQL );
	$temp->msg = $status ? "{$good} Package Successfully Updated" : "{$bad} Package Not Updated";
	
	$temp->msg .= '<br/>';
	
	$USER_SQL = sysfunc::mysql_update_str("users", $_POST['users'], $_POST['userid'], 'id');
	$status2 = $link->query( $USER_SQL );
	$temp->msg .= $status2 ? "{$good} Investor Balance Updated" : "{$bad} Investor Balance Not Updated";
	
};