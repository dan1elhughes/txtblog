<!DOCTYPE html>
<?php 
/* Change the following values to automatically change all links. If hosted on own domain, use "/" for rootpath. Otherwise enter subfolder. */
$rooturl="//workshop.xes.io";
$rootpath="/txtblog/";

$title="Blogging platform demo";
$subtitle="In progress. Apologies for any broken-ness."
?>
<html>
	<head>
		<meta charset="UTF-8">

		<link href="<?php echo $rootpath;?>includes/style.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $rootpath;?>includes/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css"></script>

		<link rel="icon" type="image/png" href="<?php echo $rootpath;?>images/logo.png" />
		<link rel="apple-touch-icon" href="<?php echo $rootpath;?>images/logo.jpg" />

		<link rel="author" href="https://plus.google.com/100101734729968276703/"/>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Dan Hughes">
		<meta name="description" content="<?php echo $subtitle;?>">

		<meta property="og:image" content="<?php echo $rooturl.$rootpath;?>images/logo.jpg" />
		<meta property="og:title" content="<?php echo $title;?>" />
		<meta property="og:description" content="<?php echo $subtitle;?>" />
		<title><?php echo $title;?></title>
	</head>
	<body>
		<header class="center">
			<a class="nohover" href="<?php echo $rootpath;?>">
				<img src="<?php echo $rootpath;?>images/logo.png" alt="logo">
				<h1><?php echo $title;?></h1>
			</a>
			<h2><?php echo $subtitle;?></h2>
		</header>