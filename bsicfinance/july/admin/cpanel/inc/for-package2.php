<?php 

if( isset($_POST['package2']) ) {

	unset($_POST['package2']);
	
	foreach( $_POST as $key => $value ) {
		$value = sysfunc::sanitize_input($value, true);
		$_POST[$key] = $value;
		if( trim($value) == "" && $key != "sid" ) { 
			$temp->status = !($temp->msg = "One or more field is required");
			break;
		};
	};
	
	if( empty($temp->msg) ) {
		
		if( empty($_POST['sid']) ):
			
			$_POST['sid'] = uniqid('mys');
			$_POST['status'] = null;
			$_POST['date'] = date('Y-m-d H:i:s');

			$sql = sysfunc::mysql_insert_str('packages', $_POST);
			$event = 'added';
		
		else:
		
			$sql = sysfunc::mysql_update_str('packages', $_POST, $_POST['sid'], 'sid');
			$event = 'updated';
		
		endif;
		
		$temp->status = $link->query( $sql );
		
		if( $temp->status ) $temp->msg = "Package successfully {$event}";
		else $temp->msg = "The package could not be {$event}";
		
	};
	
}
