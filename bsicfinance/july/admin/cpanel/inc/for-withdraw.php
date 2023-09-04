<?php


if(isset($_POST['complete'])) {
	
	$tnx = $_POST['tnx'];
	$moni = $_POST['moni'];
	$email = $_POST['email'];
	
	$sql1 = "UPDATE users SET walletbalance = walletbalance - $moni  WHERE email = '$email'";
	
	$sql2 = "SELECT * FROM wbtc WHERE tnx = '$tnx'";
    $result2 = mysqli_query($link,$sql2);
    
    if(mysqli_num_rows($result2) > 0) {
       $row = mysqli_fetch_assoc($result2);
       $row['status'];
    }
 
    if(isset($row['status']) &&  $row['status']== "completed") {
	
    	$msg = "Transaction already completed!";
    
    } else {
    		
    	if(mysqli_query($link, $sql1)) {
    	
    	    $msg = "transaction approved successfully and investor is credited!";
    	    
    		$sql3 = "UPDATE wbtc SET status = 'completed'  WHERE tnx = '$tnx'";
    		
    		mysqli_query($link, $sql3);
    		
    		# ----------------- [ DO EMAIL ] --------------------
    		
    		$__user = $GLOBALS['link']->query( "SELECT * FROM users WHERE email = '{$email}'")->fetch_assoc();
    		
    		$mail = sysfunc::initMail();
    		$mail->addAddress($__user['email'], $__user['username']);
    		
    		$eh = new email_handler();
    		
    		$emailTable = $eh->table_context(array(
    			"Username" => $__user['username'],
    			"Withdrawn Amount" => (float)$moni . " USD",
    			"Withdrawal Date" => date('Y-m-d H:i'),
    			"Reference ID" => $tnx,
    			"Status" => 'Completed'
    		),[0]);
    		
    		$mail->Subject = "Withdrawal Approved!";
    		$mail->Body = $eh->message("
    			<p>Your withdrawal request has been approved. <br> Thank you for using our service.</p>
    			<h3>Withdrawal Details</h3>
    			{$emailTable}
    		");
    		
    		($mail->send());
    		
    		# ----------------- [ /END EMAIL ] ----------------------

        } else $msg = "transaction was not approved! ";
        
    }
    
}



if(isset($_POST['delete'])){
	
	$tnx = $_POST['tnx'];
	
$sql = "DELETE FROM wbtc WHERE tnx='$tnx'";

if (mysqli_query($link, $sql)) {
    $msg = "Order deleted successfully!";
} else {
    $msg = "Order not deleted! ";
}
}
	
   
 
