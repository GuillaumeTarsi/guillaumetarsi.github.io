	<?php
		$title = "croniques";
		include_once('../partials/header.php');
	?>

	


<body>




	<div id="container">
		
		<div id="topbar"> </div>
		
		<div id="navbar"> 
			<?php include_once('../partials/navbar.php');?>
		</div>
			
			<!-- the main section where all pages will be loaded using URL variables and PHP include() function -->
		<div id="main">
			<div id ="column_center"> ah ok ^^ </div>
			<div id="column_right"> 
				<?php include_once('../partials/column_right.php');?>
			</div>
		
		<!-- this layer solve some issue about the css design, forced the #main layer height equal to height of two column layer (#columnt_left and #column_right) inside itself -->
			<div class="spacer"></div>

		</div>
	<!-- close #cont