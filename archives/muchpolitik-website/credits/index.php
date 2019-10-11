<?php
	$title = "Crédits";
	include_once('../partials/header.php');
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
						<h1>
							Crédits
						</h1>
					</div>
					
					<div id="main_text">
						Site ouaibe développé par Bill Vezay
						</br>
						</br>
						Un grand merci égalemont à ceux qui  m'ont donné un coude-main pour les graphismes :
						</br>
						<ul>
							<li> Le tas-lentueux <b>Evoflo</b></br>(son site cicontr : <a href="http://blog.evoflo.fr">http://blog.evoflo.fr</a>) </li>
							<li> Le mirobolan <b>Bruce Kent</b> </li>
							<li> L'estourbillonante Bénédicte aka <b>Bartichaud</b></li>
						</ul>

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