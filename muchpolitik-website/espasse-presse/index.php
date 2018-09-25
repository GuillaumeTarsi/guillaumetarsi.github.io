<?php

	$title = "Espasse presse";
	include_once('../partials/header.php');

	$interviews_array = file('resources/liste-interview.txt');

	function includeInterview($date, $nom_magasine, $url) {
		include ('interview.php');
	}

?>
	


<body>

	<div id="container">
		
		<?php include_once('../partials/topbar.php');?>
		
			
			<!-- the main section where all pages will be loaded using URL variables and PHP include() function -->
		<div id="main">
			
			<div id="column_left">
				<?php include_once('../partials/column_left.php'); ?>
			</div>

			<div id ="column_center">
				<div id="center_container">

					<div id="title">
						<img class="page-thumbnail" src= "../resources/img/thumbnails/thumbnail_espace-presse.png" />
						<h1>
							<?= $title ?>
						</h1>
					</div>
					
					<div id="intro">
						Ici sont regroupés les diverses interviou
						<br> et reportage sur much politik
					</div>


					<div id="content">

						<?php 
							for ($i = sizeof($interviews_array)-1 ; $i >= 0; $i-- ) {
								list($this_date,$this_nom_magasine,$this_url) = explode (";",$interviews_array[$i]);
								includeInterview($this_date,$this_nom_magasine,$this_url);
							}
						?>

					</div>


					<div id="outro">
						Si vou-m^me desirez contacter la rédaxion much politik,
						<br> veuyez utiliser le mail sicontre : <A HREF="mailto:muchpolitik@gmail.com">muchpolitik@gmail.com</A>
					</div>

	
				
				</div>


			</div>
			
			<div id="column_right"> 
				<?php include_once('../partials/column_right.php');?>
			</div>
		
		<!-- this layer solve some issue about the css design, forced the #main layer height equal to height of two column layer (#columnt_left and #column_right) inside itself -->
			<div class="spacer">
			</div>

		</div>
	<!-- close #container -->


			<div class="footer">
				<?php include_once('../partials/footer.php');?>
			</div>

	</div>
										

</body>
</html>