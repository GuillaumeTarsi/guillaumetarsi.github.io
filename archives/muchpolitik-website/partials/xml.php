<?php

	$GLOBALS['xmlFileName'] = 'flux.xml'; 
	$GLOBALS['comicsFolderName'] = 'resources/comics/'; 
	$GLOBALS['number_newCroniqe'] = 'count(glob($comicsFolderName.'*',GLOB_BRACE)) ' ; // nombre de croniques dans le dossier = numéro de la cronique qui vient d'être rajoutée


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