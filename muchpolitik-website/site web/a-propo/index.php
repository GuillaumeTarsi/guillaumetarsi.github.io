<?php
	$title = "À propo";
	include_once('../partials/header.php');
?>
	
	


<body onload="playAudioAfterDelay()">

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
					<img class="page-thumbnail" src= "../resources/img/thumbnails/thumbnail_apropo.png" />
						
					<h1>
						<?= $title ?>
					</h1>

				</div>

					<div id="main_text">

						<p class="p1"> Much Politik est un blogue de croniques politiqes
								<br><b>indépendentes et sans concecion</b>.
						</p>

						<div id="audio-container">
							<audio controls loop id="audio-player">
						  		<source src="resources/music_short.mp3" type="audio/mpeg" >
								Ton navigateur n'arrive pas à lire les pistes audio... wtf putain
							</audio>
						</div>
						

						<p class="p2">
							<span class="marge">
								Fondé en <b>Décembre 2013</b>, Much Politik a commencé en tant que fanzine subversif et impétueu.
								Au fur et à mesur des croniqes sans concecions et des scandales révélés par la rédaction,
								le petit journal devin vite un <b>magazine dampleur nationale</b>, une référence dans l'indépence jornalistique.
							</span>
						</p>
						<p class="p2">
							<span class="marge">
								Grace à lengoumen de ses lecteurs assidus, le jeune journal a pu se déployer tel un phénixe et
								faire trembler les puissants de tout pays..
							</span>
						</p>

						<p class="p2">
							<span class="marge">
								Aujourduille, Much Politik c'est plu de <b>800 million</b> de lecteurs
								qotidiens, une rédac enfiévré toujour sur la bréche de linfo,
								des correspondant dans plus de 80 pays a travers le monde...
								et une classe politiqe qui sai désormée à quoi s'en tenir !
							</span>
						</p>

					</div>
				</div>
			</div>
			
			<div id="column_right"> 
				<?php include_once('../partials/column_right.php');?>
			</div>
		

				<div class="spacer">
			</div>
		<!-- this layer solve some issue about the css design, forced the #main layer height equal to height of two column layer (#columnt_left and #column_right) inside itself -->

		</div>
	<!-- close #container -->

			<div class="footer">
				<?php include_once('../partials/footer.php');?>
			</div>

	</div>
										

</body>
</html>