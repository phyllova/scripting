<?php 

$settings = array();

$fieldset = array(
	"name" => "bname",
	"logo" => "logo",
	"emaila" => "email",
	"phone" => "phone",
	"address" => "baddress",
	"title" => "title",
	"bankurl" => "sname",
	"wl" => "wl",
	"rb" => "rb",
	"cy" => "cy",
	'refbonus' => 'refbonus'
);

$query = mysqli_query($link, "SELECT * FROM settings ");


$rowset = mysqli_fetch_assoc($query);

foreach( $fieldset as $key => $column ) {
	$settings[$key] = !empty($rowset) ? $rowset[ $column ] : null;
};

$settings['logourl'] = sysfunc::url( __admin_contents . '/logo/' . (!empty($settings['logo']) ? $settings['logo'] : 'logo.png') );



