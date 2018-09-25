<?php
	$title = "Mur des contributteurs";
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
							<?= $title ?>
						</h1>
					</div>
					
					<div id="intro">
						<div class="text">
							Voici la liste des contributteurs du mois actuel !
							Par leur générositée ils apportent leur pierre à l'eddy-fils et participent à soutenir une presse indépondante et sans concecion.
							</br>Mercille à eux !!
							</br>
							</br>
							<i>Pour vous aussi devenir contributteur (avec contrepartilles) rendez vous sur la page <a href=https://www.tipeee.com/much-politik>Tipeee</a>.</i>
						</div>	
					</div>

					<div id="selector_month">
						<select name="select" onchange = "updateListeContributteurs(this.value);">
							<option value="2016-08">Oûte 2016</option>
							<option value="2016-09">Septombre 2016</option>
							<option value="2016-10">Octorbre 2016</option>
							<option value="2016-11">Novombrbe 2016</option>
							<option value="2016-12">Déççombre 2016</option>
							<option value="2017-01">Jonvier 2017</option>
							<option value="2017-02">Févriller 2017</option>
							<option value="2017-03">Marsse 2017</option>
							<option value="2017-04">Arvrile 2017</option>
							<option value="2017-05">Mé 2017</option>
							<option value="2017-06">Jouin 2017</option>
							<option value="2017-07">Jouillée 2017</option>
							<option value="2017-08" selected> Oûte 2017</option>


						</select>
					</div>

					<div id="tab_contributteurs">
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