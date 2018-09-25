<?php

	$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$jsonfilepath = 'resources/comicsdate.json';

	
	$id_first_cronique = 1 ;
	$id_last_cronique = count(glob("resources/comics/*",GLOB_BRACE)); // nombre de croniques dans le dossier
	$id_random_cronique = rand($id_first_cronique,$id_last_cronique);

	$url_first_cronique = '?id='.$id_first_cronique.'#img';
	$url_last_cronique = '?id='.$id_last_cronique.'#img';
	$url_random_cronique = '?id'.$id_random_cronique.'#img';

	if (!isset($_GET['id'])){
		$id_current_cronique = $id_last_cronique;
	}
	else {		
		$id_current_cronique = $_GET['id'];
		// redirection si l'id est trop élevé (> nombre de croniques)
		if($id_current_cronique > $id_last_cronique) {
  			header('Location: '.$url_last_cronique);
 		 	exit();
 		 }
 		 // redirection si l'id est trop faible (< id de la première cronique, 1 normalement)
 		 if($id_current_cronique < 1 ) {
  			header('Location: '.$url_first_cronique);
 		 	exit();
 		 }

 	 }

 	 $this_is_first_cronique = ($id_current_cronique==1);
 	 $this_is_last_cronique = ($id_current_cronique == $id_last_cronique);

	$date = null;
	$string_comicsdate = file_get_contents($jsonfilepath);
	$array_comicsdate = json_decode($string_comicsdate,true);

	for ( $i = 0; $i < count($array_comicsdate); $i++) {
		if ($array_comicsdate[$i]["id"] == $id_current_cronique) {
			$date = $array_comicsdate[$i]["date"];
			break;
		}
	}
 		
 	$filename = 'resources/comics/comic ('.$id_current_cronique.').jpg';
 	$title = "votre magazine indépeden et san concecion";
 	if ($id_current_cronique!==$id_last_cronique) {
 		$title = "cronique ".$id_current_cronique;
 	}

	
	include_once('partials/header.php');

?>

<script type="text/javascript">
	<?php
	  echo "var id_current_cronique = '{$id_current_cronique}';"; // useful for the fancybox zoom in
	?>
</script>

<body>


 <!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5&appId=1177871425573309";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


	<div id="container">
		<div id="topbar"> 
			<a href=".">
				<div id="home_button">
				</div>
			</a>
	
		</div>
		
			<!-- the main section where all pages will be loaded using URL variables and PHP include() function -->
		<div id="main">
			<div id="column_left">
				<?php include_once('partials/column_left.php'); ?>
			</div>
			<div id="column_center">
				<?php include_once('partials/column_center.php'); ?>
			</div>
			<div id="column_right">
				<div id="socialbar"> 
					<?php include_once('partials/socialbar.php');?>
				</div>

				<div id="bookbar" class="row">
       				 <a href="http://goo.gl/MzBcIo" title = 'bookbar'>
        				<div id="bouton_book" class="button_giggle">
        				</div>
       				</a>
       			</div>

			</div>
			<div class="spacer"></div>
		</div>


		<div class="footer">
			<?php include_once('partials/footer.php'); ?>
		</div>
	<!-- close #container -->
	</div>

		
											

	</body>

</html>