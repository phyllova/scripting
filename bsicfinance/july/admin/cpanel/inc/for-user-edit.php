<?php

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	
	unset($_POST['edit']);
	sysfunc::sanitize_input($_POST);
	
	$sql = sysfunc::mysql_update_str("users", $_POST, $_GET['id'], 'id');
	$update = mysqli_query($link, $sql);
	
	if( $update ) $temp->status = !!($msg = "Account details updated successfully!");
	else $temp->status = !($msg = "Account details could not be updated!");
	
}


$id = sysfunc::sanitize_input($_GET['id']);
$sql= "SELECT * FROM users WHERE id = '$id'";

$result = mysqli_query($link,$sql);
$user = mysqli_fetch_assoc($result);

