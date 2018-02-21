<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<title><?= $this->getSiteTitle(); ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Expires" content="0" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Cache-Control" content="no-cache" />
	<meta http-equiv="Page-Enter" content="RevealTrans(Duration=2.0,Transition=2)" />
	<meta http-equiv="Page-Exit" content="RevealTrans(Duration=3.0,Transition=12)" />
	<meta http-equiv="X-UA-Compatible" content="chrome=1" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<meta name="keywords" content="Keywords will be go here..." />
	<meta name="description" content="Description will be go here..." />
	<meta name="subject" content="Subject will be go here..." />

	<meta name="copyright" content="Papp Balázs © 2018" />
	<meta name="author" content="Papp Balázs" />
	<meta name="designer" content="Papp Balázs" />
	<meta name="owner" content="Papp Balázs" />
	<meta name="reply-to" content="pbazsi003@gmail.com" />

	<meta name="language" content="EN" />

	<meta name="robots" content="index, follow" />
	<meta name="GOOGLEBOT" content="index, follow" />

	<meta name="Classification" content="Non-Bussiness" />
	<meta name="category" content="Social Network" />

	<meta name="mssmarttagspreventparsing" content="true" />
	<meta name="application-name" content="inviteFriends" />

	<meta property="og:title" content="<?= $this->getSiteTitle(); ?>" />
	<meta property="og:type" content="social network" />
	<meta property="og:keywords" content="Keywords will be go here..." />
	<meta property="og:description" content="Description will be go here..." />
	<meta property="og:url" content="The URL will be go here..." />
	<meta property="og:email" content="pbazsi003@gmail.com" />

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,70i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster+Two:400,400i,700,700i" />

	<?php include "styles.php"; ?>

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<![endif]-->

	<?php include "scripts.php"; ?>

	<?= $this->content("head"); ?>
	
</head>
<body>

	<?php include "menu.php"; ?>

	<div class="container-fluid wrapper">
		<footer class="website-footer main-footer">

			<?= $this->content("body"); ?>

		</footer>
	</div>

</body>
</html>
