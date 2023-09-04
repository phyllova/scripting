<?php

// delete investor
if(isset($_POST['delete'])){
	
	$id = $_POST['id'];
	
$sql = "DELETE FROM packages WHERE id='$id'";

if (mysqli_query($link, $sql)) {
    $msg = "Package deleted successfully!";
} else {
    $msg = "Package not deleted! ";
}
}
// verify investor

if(isset($_POST['act'])){
	
		$id = $_POST['id'];
	
$sql = "UPDATE packages SET status = '1'  WHERE id='$id'";

if (mysqli_query($link, $sql)) {
    $msg = "Package activated successfully!";
} else {
    $msg = "Package not activated! ";
}
}


if(isset($_POST['dact'])){
	
		$id = $_POST['id'];
	
$sql = "UPDATE packages SET status = '0'  WHERE id='$id'";

if (mysqli_query($link, $sql)) {
    $msg = "Package deactivated successfully!";
} else {
    $msg = "Package not deactivated! ";
}
}

