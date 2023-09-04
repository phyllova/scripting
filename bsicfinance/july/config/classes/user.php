<?php

class user {
	
	protected $user;
	
	public function __construct( string $table = 'users' ) {
		global $link;
		$email_key = "{$table}:email";
		if( empty($_SESSION[ $email_key ]) || empty($_SESSION['password']) ) return;
		
		### secure input;
		$_SESSION[ $email_key ] = sysfunc::sanitize_input($_SESSION[ $email_key ]);
		$_SESSION['password'] = sysfunc::sanitize_input($_SESSION['password']);
		
		### prepare query;
		$sql = "
			SELECT * FROM {$table}
			WHERE email = '" . $_SESSION[ $email_key ] . "' AND password = '{$_SESSION['password']}'
		";
		
		### get user;
		$user = $link->query( $sql )->fetch_assoc();
		$this->user = $user;
	}
	
	public function info() {
		return $this->user;
	}
	
	public function __get($key) {
		return $this->user[$key] ?? null;
	}
	
	public static function get(array $__user, string $name) {
		switch($name) {
			case 'avatar':
				return sysfunc::url( __users_contents . '/images/profile/' . (empty($__user['image']) ? 'icon.png' : $__user['image']) );
			case 'reflink':
				return sysfunc::url( __users_dir . '/form/signup.php?refcode=' . $__user['refcode'] );
		};
	}
	
}