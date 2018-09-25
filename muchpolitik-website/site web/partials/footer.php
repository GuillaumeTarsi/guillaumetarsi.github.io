<?php
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<div class="row">
      
    <div class="col-xs-3">
		Powered by <a href="">Billvezay</a>
    </div>

     <div class="col-xs-3">
        <a href="http://www.muchpolitik.fr/credits">Crédits</a>
    </div>

    <div class="col-xs-3">
    	<a href="mailto:vezaybill@gmail.com?subject=[Bug Report]&body=Bonjour cher Much, je voulais te dire que jadore ton site !!   Aussi voici le bug que j'ai observé sur ton ouaibsite à la page <?php echo $url ?> : "> Signaler un bug </a>
    </div>

    <div class="col-xs-3">
    	© Much Politik <?php echo date("Y")?>
    </div>
    

</div>