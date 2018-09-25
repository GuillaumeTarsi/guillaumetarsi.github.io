



<?php
	$title = "Crédits";
	$url = "blabla";
	include_once('../partials/header.php');

	$GLOBALS['webPath'] = $webPath; 
	$GLOBALS['XMLFileName'] = $webPath.'/flux.xml'; 
	$GLOBALS['comicsFolderName'] = '../resources/comics';
	$temp = new FilesystemIterator($comicsFolderName, FilesystemIterator::SKIP_DOTS) ; // nombre de croniques dans le dossier +1 = numéro de la cronique qui VA être rajoutée
	$GLOBALS['number_newCroniqe'] = iterator_count($temp)+1;
	$GLOBALS['jsonfilepath'] = $webPath.'/resources/comicsdate.json';

	addComicFile();
	updateJsonFile();
	updateXMLFile();



function updateXMLFile () {
	global $webPath, $number_newCroniqe, $XMLFileName;

	try { $XMLString = file_get_contents($XMLFileName);
			}
	catch (Exception $e) {
		echo "Erreur dans l'ouverture du fichier XML";
		echo $e->getMessage();
		}
 
	$dom = new DomDocument;
	$dom->preserveWhiteSpace = FALSE;
	$dom->loadXML($XMLString);
		
	$dom = addCroniqueToXMLFile($dom,'');
			
	$dom->saveXML();
	$result = $dom->save($XMLFileName);

	if ($result != FALSE) {
		echo "<br>  >  updating XML file successful !";
	}
}

// ET ON UPDATE LE COMICSDATE.JSON
function updateJsonFile () {
	global $webPath, $number_newCroniqe, $jsonfilepath;
	$data = array('id'=> $number_newCroniqe,
					    'date'=>date('d/m/y',time())
					    );
	$a = file_get_contents($jsonfilepath);
	$tempArray = json_decode($a, TRUE);
	array_push($tempArray, $data);
	$tempJson = json_encode($tempArray, TRUE);

	$result = file_put_contents($jsonfilepath,$tempJson);

	if ( $result != FALSE) {
		echo "<br>  >  updating comicsDate.json file successful !";
	}
}



function addComicFile () {
	global $comicsFolderName, $webPath, $number_newCroniqe;

	if ($_FILES['uploaded_file']['error']) { 
		   
		switch ($_FILES['nom_du_fichier']['error']){     
		    case 1: // UPLOAD_ERR_INI_SIZE     
		        echo"Le fichier dépasse la limite autorisée par le serveur (fichier php.ini) !";     
		    break;     
		    case 2: // UPLOAD_ERR_FORM_SIZE     
		        echo "Le fichier dépasse la limite autorisée dans le formulaire HTML !"; 
		    break;     
		    case 3: // UPLOAD_ERR_PARTIAL     
		        echo "L'envoi du fichier a été interrompu pendant le transfert !";     
		    break;     
		    case 4: // UPLOAD_ERR_NO_FILE     
		        echo "Le fichier que vous avez envoyé a une taille nulle !"; 
		    break;     
		}     
	}     
	
	else {     
		 // $_FILES['nom_du_fichier']['error'] vaut 0 soit UPLOAD_ERR_OK     
	 	if (!(isset($_FILES['uploaded_file']['tmp_name'])&&($_FILES['uploaded_file']['error'] == UPLOAD_ERR_OK))) {
	 		echo "Problem 1 while uploading the file";
	 	}

	 	else {

			$fileName = $_FILES["uploaded_file"]["name"]; // nom original chez la personne
			$fileTmpLoc = $_FILES["uploaded_file"]["tmp_name"]; // location temporaire sur le serveur
			$fileDestination = $webPath.'/resources/comics/comic ('.$number_newCroniqe.').jpg'; // /!\ PAR RAPPORT A LA LOCALISATION DU SCRIPT !! /!\
			
			try { move_uploaded_file($fileTmpLoc, $fileDestination) ;
				echo $fileDestination;

				}
			catch (Exception $e) {
				echo "Problem 2 while uploading the file";
				echo $e->getMessage();
			}
			
			echo "<br>  >  adding comic file successful !";
		}
	}
}


function addCroniqueToXMLFile ($domfile, $different_title) { /* ajouter cronique et update le XML 	*/

	global $number_newCroniqe;

	$default_title = 'Chroniqe numéro '.$number_newCroniqe;
	$title = $different_title ?: $default_title;
	$link = 'http://www.muchpolitik.fr/?id='.$number_newCroniqe.'#comic';
	$description= "<img src='http://www.muchpolitik.fr/resources/comics/comic%20(".$number_newCroniqe.").jpg'/>
			 Une nouvelle cronique indépendente et san concecion !";
	$image_info = "<title>Logo</title> <url>http://www.muchpolitik.fr/logo.png</url>";
	
	$channelRSS_liste= $domfile->getElementsByTagName('channel'); // obligé de faire une liste de 1 élément car y a pas de méthode getElement(sans s)ByTagName...
				 

	foreach($channelRSS_liste as $channelRSS){ // 1 seul élement dans la liste..
		$item_node = $domfile->createElement('item');

		$title_node = $domfile->createElement('title');
		$title_content = $domfile->createTextNode($title);
		$item_node-> appendChild($title_node);
		$title_node->appendChild($title_content);

		$link_node = $domfile->createElement('link');
		$link_content = $domfile->createTextNode($link);
		$item_node->appendChild($link_node);
		$link_node->appendChild($link_content);

		$guid_node = $domfile->createElement('guid');
		$guid_content = $domfile->createTextNode($link);
		$item_node->appendChild($guid_node);
		$guid_node->appendChild($guid_content);

		$description_node = $domfile->createElement('description');
		$description_content = $domfile->createCDATASection($description);
		$item_node->appendChild($description_node);
		$description_node->appendChild($description_content);

		$channelRSS->appendChild($item_node);
	}
	return $domfile;
}
			
?>