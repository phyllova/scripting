<?php 

class shares {
	
	public function categories( $subcategory = false ) {
		global $link;
		$data = array();
		$group = $link->query( "SELECT * FROM sharesgroup" );
		if( $group->num_rows ) {
			while( $category = $group->fetch_assoc() ):
				$key = $subcategory ? 'sharesubcat' : 'sharescat';
				$value = strtolower($category[$key]);
				if( !in_array($value, $data) ) $data[] = $value;
			endwhile;
		};
		return $data;
	}
	
	public static function increment( $email ) {
		
		global $link;
		
		$sql = "
			SELECT * FROM investments 
			WHERE email='{$email}' 
				AND status = 1
		";
		
		$result = $link->query($sql);
		
		if( !$result->num_rows ) return;
		
		while( $share = $result->fetch_assoc() ):
		
			if( empty($share['amount']) ) continue;
			
			foreach(['amount', 'increase', 'bonus'] as $key) $share[$key] = (float)$share[$key];
			
			$profit = $share['amount'] * $share['increase'] * 0.01;
			
			$investment_time = strtotime($share['date']);
			$profit_time = empty($share['last_increase_date']) ? $investment_time : strtotime($share['last_increase_date']);
			$activation_time = strtotime($share['activation_date']);
			$current_time = time();
			
			$days_apart = (int)(($current_time - $profit_time) / 86400);
			$profit = $profit * $days_apart;
			if( empty($profit) ) continue;
			
			$increment_date = date("Y-m-d H:i:s");
			
			$sqls = array(
				"
					UPDATE users 
					SET walletbalance = (walletbalance + $profit)
					WHERE email='$email'
				",
				"
					UPDATE investments 
					SET last_increase_date = '{$increment_date}',
						increased_usd = (increased_usd + $profit)
					WHERE id = {$share['id']}
				"
			);
			
			$duration_used = (int)(($current_time - $activation_time) / 86400);
			
			if( $duration_used >= (int)$share['duration'] ) {
				# Investment Expired
				$sqls[] = "
					UPDATE investments
					SET deactivation_date = '{$increment_date}',
						status = -1
					WHERE id = {$share['id']}
				";
			}
			
			foreach( $sqls as $sql ) $link->query( $sql );
		
		endwhile;
		
	}
	
	public static function total_profit( $email ) {
		global $link;
		$sql = "
			SELECT SUM(increased_usd) as total
			FROM investments
			WHERE email = '{$email}'
			GROUP BY email
		";
		$query = $link->query( $sql );
		$result = $query->fetch_assoc();
		return !$result ? 0 : round((float)$result['total'], 4);
	}
	
}
