



<?php

	$GLOBALS['xmlFileName'] = '../flux.xml'; 
	$GLOBALS['comicsFolderName'] = '../resources/comics/'; 
	$GLOBALS['number_newCroniqe'] = count(glob($comicsFolderName.'*',GLOB_BRACE)) +1 ; // nombre de croniques dans le dossier +1 = numéro de la cronique qui VA être rajoutée


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
			$fileDestination = '../resources/comics/comic ('.$number_newCroniqe.').jpg'; // /!\ PAR RAPPORT A LA LOCALISATION DU SCRIPT !! /!\
			
			try { move_uploaded_file($fileTmpLoc, $fileDestination) ;
				}
				 
										 catch (Exception $e) {
										 		echo "Problem 2 while uploading the file";
										 		echo $e->getMessage();
										 	}
			
			echo "upload successful !";


///     UPLOAD OK


///     XML MAINTENONT



			try { $xmlString = file_get_contents($xmlFileName);
				}
											catch (Exception $e) {
												echo "Erreur dans l'ouverture du fichier XML";
												echo $e->getMessage();
											}
	 
				$dom = new DomDocument;
				$dom->preserveWhiteSpace = FALSE;
				$dom->loadXML($xmlString);
			
				$dom = addCronique($dom,'');
				
				$dom->saveXML();
				$dom->save($xmlFileName);

			}
	}












				function addCronique ($domfile, $different_title) {

				global $number_newCroniqe;
				$default_title = 'nouvelle cronique';
				$title = $different_title ?: $default_title;
				$link = 'http://localhost/muchpolitik/index2.php?id='.$number_newCroniqe.'#comic';
				$description= "<img align='left' hspace='5' src='http://www.muchpolitik/resources/comics/comic%20(".$number_newCroniqe.").jpg'/>
			 nouvelle cronique indépendente et san concecion]";
				

				$channelRSS_liste= $domfile->getElementsByTagName('channel'); // obligé de faire une liste de 1 élément car y a pas de méthode getElementByTagName...
				
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
						$description_node = $domfile->createElement('description');
							$description_content = $domfile->createCDATASection($description);
							$item_node->appendChild($description_node);
							$description_node->appendChild($description_content);
					
					$channelRSS->appendChild($item_node);
					}
					return $domfile;
				}
?>