<?php 

$msg = null;

if(isset($_POST['approve'])) {
	
	call_user_func(function() use(&$msg) {
		
		global $link; 
		
		$tnx = $_POST['tnx'];
		$usd = $_POST['usd'];
		$email = $_POST['email'];
		
		$sql2 = "SELECT * FROM btc WHERE tnxid = '$tnx'";
		
		$result2 = mysqli_query($link,$sql2);
		
		if(!mysqli_num_rows($result2)) return;
		
		$row = mysqli_fetch_assoc($result2);

		if($row['status'] == "approved") $msg = "Transaction already approved!";
		
		else {
			
			$sql_approve = "UPDATE btc SET status = 'approved'  WHERE tnxid = '$tnx'";
		
			if(mysqli_query($link, $sql_approve)) {
				
				$msg = "Transaction approved successfully ";
				
				$sql_credit = "UPDATE users SET walletbalance = walletbalance + $usd  WHERE email='$email'";
				
				$msg .= (mysqli_query($link, $sql_credit)) ? "and investor is credited!" : "but inversor was not credited";
				
				$__user = $GLOBALS['link']->query( "SELECT * FROM users WHERE email = '{$email}'")->fetch_assoc();
				
				$mail = sysfunc::initMail();
				$mail->addAddress($email);
				
				$eh = new email_handler();
		
        		$emailTable = $eh->table_context(array(
        			"Username" => $__user['username'],
        			"Deposited Amount" => (float)$usd . " USD",
        			"Approval Date" => date("Y-m-d H:i"),
        			"Reference ID" => $tnx,
        			"Status" => 'Approved'
        		),[0]);
        		
        		$mail->Subject = "Deposit Approval!";
        		$mail->Body = $eh->message("
        			<p>This is to notify you that your deposit has been approved and you have been credit.</p>
        			<h3>Deposit Details</h3>
        			{$emailTable}
        		");
		
				($mail->send());
				
			} else $msg = "Transaction was not approved! ";

		};
	
	});
	
};
	

if(isset($_POST['referrer'])) {
	
	call_user_func(function() use(&$msg, $link) {
		
	    $referred = $_POST['referred'];
		$email = $_POST['email'];
		$tnx = $_POST['tnx'];
		$usd = $_POST['usd'];
		
		$refb = (double)$usd * 0.05;
		
		$sql6 = "UPDATE users SET refbonus = refbonus + $refb, walletbalance = walletbalance + $refb  WHERE refcode ='$referred'";
				
		$msg = (mysqli_query($link, $sql6)) ? "Referrer paid successfully!" : "Cannot pay the referer!";
		
	});
		
 }


if(isset($_POST['delete'])) {
	
	call_user_func(function() use(&$msg, $link) {
		
		$tnx = $_POST['tnx'];
			
		$sql = "DELETE FROM btc WHERE tnxid='$tnx'";

		$msg = (mysqli_query($link, $sql)) ? "Order deleted successfully!" : "Order not deleted! ";
		
	});
	
}
