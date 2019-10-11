	<?php
		$title = "Contakt";
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
						<img class="page-thumbnail" src= "../resources/img/thumbnails/thumbnail_contact.png" />
						<h1>
							<?= $title ?>
						</h1>
					</div>
					

					<div id="img-container">
						 <A HREF="mailto:muchpolitik@gmail.com"><img src="resources/mail.gif"> </img></a>
					</div>

					<div id ="texte">
					</div>
				</div>

			 </div>
			<div id="column_right"> 
				<?php include_once('../partials/column_right.php');?>
			</div>
		
		<!-- this layer solve some issue about the css design, forced the #main layer height equal to height of two column layer (#columnt_left and #column_right) inside itself -->
			<div class="spacer"></div>

		</div>
	<!-- close #container -->
		<div class="footer">
			<?php include_once('../partials/footer.php'); ?>
		</div>
	</div>							
</body>
</html>