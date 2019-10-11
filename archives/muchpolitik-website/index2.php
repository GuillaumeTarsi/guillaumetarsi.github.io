<?php
	$title = "ackeuil";
	include_once('partials/header.php');
?>


<body>

	<div id="fb-root"></div>
		<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>


	<div id="container">
			
		<div id="topbar"> 

			<a href=".">
				<div id="home_button">
				</div>
			</a>
			
			<div id="socialbar"> 
				<?php include_once('partials/socialbar.php');?>
			</div>
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
				<?php include_once('partials/column_right.php'); ?>
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