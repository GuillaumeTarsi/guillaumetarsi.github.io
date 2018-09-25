<div id="comic"></div>


	<div id="css_part1">

		<div id="cronique_date">
			<div id="cronique_date_texte" class= "bigtext">
				- Cronique du <?= $date ?>-
			</div>
	</div>
				

 <div class="small-box">

		<div id ="comic_container">
			<div id = "comic_filler">

			<a title= " " class="fancybox" href="<?= $filename?>">
				<img id="img_comic" src="<?= $filename?>" alt=""/>
			</a>
		</div>


		<div id="sharebar">
			<div class="fb-share-button" data-href="http://www.muchpolitik.fr/?id=<?=$id_current_cronique?>#comic"
			 data-layout="button">
			</div>
			<a class="twitter-share-button" href="http://www.muchpolitik.fr/?id=<?=$id_current_cronique?>#comic" data-count=none> Tweet</a>
		</div>

		</div>
    </div>    



	

		<div id="cronique_navbar" class="row">
                    
				<div class="cronique_navbar-part col-xs-1">
				</div>

				<div id="arrow_first-container" class="cronique_navbar-part col-xs-2"> 
					<?php if ($this_is_first_cronique)
						include_once('partials/arrow_first_passive.php');
						else include_once('partials/arrow_first_active.php');
					?> 
				</div>

				<div id="arrow_left-container" class="cronique_navbar-part col-xs-2">
					<?php if ($this_is_first_cronique)
						include_once('partials/arrow_left_passive.php');
						else include_once('partials/arrow_left_active.php');
					?> 
				</div>

				<div id="arrow_random-container" class="cronique_navbar-part col-xs-2">
					<?php include_once('partials/arrow_random.php');
					?> 
				</div>

				<div id="arrow_right-container" class="cronique_navbar-part col-xs-2">
					<?php if ($this_is_last_cronique)
						include_once('partials/arrow_right_passive.php');
						else include_once('partials/arrow_right_active.php');
					?> 
				</div>

				<div id="arrow_last-container" class="cronique_navbar-part col-xs-2">
					<?php if ($this_is_last_cronique)
						include_once('partials/arrow_last_passive.php');
						else include_once('partials/arrow_last_active.php');
					?> 
				</div>

				<div class="cronique_navbar-part col-xs-1">
				</div>
						
		</div>

	</div>

		
	<!--<div id="cronique_comments">
		<div id="comments_title" class="bigtext"> - Courrier des lecteurs - </div>

		<div id="disqus_thread">
		</div>
			<script type="text/javascript">
				/* * * CONFIGURATION VARIABLES * * */
				disqus_shortname = 'muchpolitik';
				disqus_identifier =  'http://www.muchpolitik.fr/?id='+<?= $id_current_cronique ?>;
				disqus_title =  'http://www.muchpolitik.fr/?id='+<?= $id_current_cronique ?>;
				disqus_url = 'http://www.muchpolitik.fr/?id='+<?= $id_current_cronique ?>;

				if ($('head script[src="http://' + disqus_shortname + '.disqus.com/embed.js"]').length == 0) {
                	(function () {
                	var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                	dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
                	(document.getElementsByTagName('head')[0]).appendChild(dsq);
            		})();
        		}
        		
        		if (typeof DISQUS != "undefined") {
            		DISQUS.reset({
                		reload: true,
                		config: function () {
                    		this.page.identifier = <?= $id_current_cronique ?>;
                    		this.page.url = 'http://www.muchpolitik.fr/?id=' + <?= $id_current_cronique ?>;
                		}
            		});
        		}




				/* * * DON'T EDIT BELOW THIS LINE * * */
				(function() {
				    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
				    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
				})();
			</script>
	</div> --> 




