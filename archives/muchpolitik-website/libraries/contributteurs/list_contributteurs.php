<?php

	function getMonthContributteurs($monthID) {

	$contributteurs_string = file_get_contents('list_contributteurs/'.$monthID.'.json');
	$contributteurs_array = array_reverse(json_decode($contributteurs_string, true));
		
	for ($i = sizeof($contributteurs_array)-1 ; $i >= 0; $i-- ) {
			//list($this_date,$this_nom_magasine,$this_url) = explode (";",$contri_array[$i]);
			getContributteur($contributteurs_array[$i]);
		}
}

	function getContributteur($contributteur) {
		include ('contributteur.php');
	}

	if (isset($_GET['monthID'])) {
		getMonthContributteurs($_GET['monthID']);
	}

?>



