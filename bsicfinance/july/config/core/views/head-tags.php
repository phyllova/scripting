<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">

<link rel="icon" href="<?php echo $settings['logourl']; ?>">
<title><?php echo $settings['title']; ?></title>

<link rel="stylesheet" href="<?php echo sysfunc::url( __core_vendors . '/components/font-awesome/css/font-awesome.min.css' ); ?>">
<link rel="stylesheet" href="<?php echo sysfunc::url( __core_vendors . '/components/dataTables/datatables.min.css' ); ?>">

<link rel="stylesheet" href="<?php echo sysfunc::url( __core_views . '/assets/css/bootstrap.min.css' ); ?>" />
<link rel="stylesheet" href="<?php echo sysfunc::url( __core_views . '/assets/css/lineicons.css' ); ?>" />
<link rel="stylesheet" href="<?php echo sysfunc::url( __core_views . '/assets/css/materialdesignicons.min.css' ); ?>" />
<link rel="stylesheet" href="<?php echo sysfunc::url( __core_views . '/assets/css/fullcalendar.css' ); ?>" />
<link rel="stylesheet" href="<?php echo sysfunc::url( __core_views . '/assets/css/fullcalendar.css' ); ?>" />
<link rel="stylesheet" href="<?php echo sysfunc::url( __core_views . '/assets/css/main.css' ); ?>" />
	
<link rel="stylesheet" href="<?php echo sysfunc::url( __dir__ . '/style.css' ); ?>">

<!-- CSS Files -->

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="<?php //echo sysfunc::url( __core_views . '/assets/css/demo.css' ); ?>">

<?php foreach( $temp->HTMLHeader as $script ) print_r($script); ?>
	