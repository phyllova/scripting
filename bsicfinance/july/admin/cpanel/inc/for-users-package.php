<?php

$date = date("Y-m-d H:i:s");


// delete investment

if(isset($_POST['delete'])){

	$id = $_POST['id'];
	$sql = "DELETE FROM investments WHERE id='$id'";
	if (mysqli_query($link, $sql)) $msg = "Investment deleted successfully!";
	else $msg = "Investment not deleted! ";
	
}


// activate investment

if(isset($_POST['activate'])){

	$id = $_POST['id'];
	
	$sql = "
		UPDATE investments 
		SET status = '1',
			activation_date = '{$date}',
			deactivation_date = ''
		WHERE id='$id'
	";

	if (mysqli_query($link, $sql)) $msg = "investment activated successfully!";
	else $msg = "investment not activated! ";
	
}


// deactivate investment

if(isset($_POST['deactivate'])){
	
	$id = $_POST['id'];
	$sql = "
		UPDATE investments 
		SET status = '0',
			deactivation_date = '{$date}'
		WHERE id='$id'";

	if (mysqli_query($link, $sql)) $msg = "investment deactivated successfully!";
	else $msg = "investment not deactivated! ";
	
}


// end investment

if(isset($_POST['end'])){
	
	$id = $_POST['id'];
	$sql = "
		UPDATE investments 
		SET status = '-1'
		WHERE id='$id'";

	if (mysqli_query($link, $sql)) $msg = "investment ended successfully!";
	else $msg = "investment not ended! ";
	
}

