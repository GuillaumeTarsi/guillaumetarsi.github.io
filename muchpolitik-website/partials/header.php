
	<!DOCTYPE html>
	<html lang="fr" dir = "ltr">

<?php
	define("LOCAL", "/muchpolitik");
	define("WEB", "http://www.muchpolitik.fr");
	$environment = LOCAL; //change to WEB if you're live

	$thisDirectoryPath = explode('\\', getcwd()); /* return current path in an array */
	$thisDirectoryName = $thisDirectoryPath[count($thisDirectoryPath)-1]; /* return name of directory without the path */

	$webPath = './';
	if (substr($thisDirectoryName, -11) !== 'muchpolitik') { /* if the current dir isn't called 'muchpolitik' */
		$webPath = '../';
	}	
	$jsPath = $webPath.'lib/scripts/';
	$cssPath = $webPath.'css/';

	if (strpos($url,'?id=') !== false) {// if the url contains "?id=" in it
 		$meta_image = $webPath.'resources/comics/comic%20('.$id_current_cronique.').jpg';
 		$meta_url = 'http://www.muchpolitik.fr/?id='.$id_current_cronique.'#comic';
 		$meta_title = 'Chroniqe Much Politik numéro '.$id_current_cronique;
 	}
 	else {
 		$meta_image =  'http://www.muchpolitik.fr/resources/img/logo_much.png';
 		$meta_url = $url;
 		$meta_title = "Much Politik, ".$title;
 	}
?>

	<head>
		
		<title>Much Politik - <?=$title?></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

			<!-- You can use open graph tags to customize link previews.
	    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
	   	<meta property="fb:app_id" content="1177871425573309" />
		<meta property="og:type" content="article" />
	   	<meta property="og:url" content="<?=$meta_url?>" />
	   	<meta property="og:title" content="<?=$meta_title?>" />
	    <meta property="og:image" content="<?=$meta_image?>" /> 
	    <meta property="og:description" content="votre magazine dinformacion indépendente et san concecion !" />
	    <meta property="og:site_name" content="Much Politik"/>

		<link rel="shortcut icon" href="<?=$webPath?>resources/img/favicon.ico">
		<link rel="stylesheet" href="<?= $cssPath?>bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="<?= $cssPath?>fonts.css">
		<link rel="stylesheet" href="<?= $cssPath?>main.css">

		<link rel="stylesheet" href="specific.css">
		    
		   <!-- Add jQuery library -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

			<!-- Add fancyBox -->
		<link rel="stylesheet" href="<?= $jsPath ?>fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
		<script type="text/javascript" src="<?= $jsPath ?>fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
		
		<link rel="stylesheet" href="<?= $jsPath ?>fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
		<script type="text/javascript" src="<?= $jsPath ?>fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>

		<script type="text/javascript" src="<?= $jsPath ?>widgets.js"></script>

			<!-- Add snaptortoise Konami -->
		<link rel="stylesheet" href="<?= $jsPath ?>snaptortoise-konami-js-06c0c68/konami.js" type="text/javascript" />
		<script type="text/javascript" src="<?= $jsPath ?>snaptortoise-konami-js-06c0c68/konami.js"></script>

		<script type="text/javascript" src="<?= $jsPath ?>main.js"></script>
		
			<!-- Add specific.js -->
		<script type="text/javascript" src="specific.js">
		</script>

		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87399110-1', 'auto');
  ga('send', 'pageview');

</script>


	</head>
