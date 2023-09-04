<?php


if( $_SERVER['REQUEST_METHOD'] == 'POST' ):
	
	$date = date("Y-m-d H:i:s");
	
	switch($_POST['action']):
		
		case "activate":
				
				$SQL = "
					UPDATE investments
					SET status = 1,
						activation_date = '{$date}',
						last_increase_date = '{$date}'
					WHERE id = {$_POST['id']}
						AND status = 0
				";
				
				$temp->status = $link->query( $SQL );
				
				if( $temp->status ) {
					
					$temp->msg = "The investment plan has been activated successfully";
					
					if( !empty($_POST['awoof']) ):
					
						$BONUS_SQL = "
							UPDATE users
							SET walletbalance = (walletbalance + {$_POST['awoof']})
							WHERE id = '{$__user['id']}'
						";
						
						if( $link->query( $BONUS_SQL ) ) {
							$temp->msg .= "<br> You received \${$_POST['awoof']} activation bonus";
						};
						
					endif;
					
				} else $temp->msg = "The investment plan could not be activated";
		
			break;
			
			
		case "end":
		
				$SQL = "
					UPDATE investments
					SET status = -1,
						deactivation_date = '{$date}'
					WHERE id = {$_POST['id']}
				";
				
				$temp->status = $link->query( $SQL );
				
				$temp->msg = ($temp->status) ? "The investment plan has been ended" : "The investment plan could not be ended";
				
			break;
		
	endswitch;

endif;

