<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title('|') ?></title>
	<?php wp_head(); ?>
</head>
<?php 
	//get main settings 
	global $_set;
	$settings = $_set->settings;
 ?>
<body <?php body_class(); ?>>
