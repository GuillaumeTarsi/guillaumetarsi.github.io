	<form method="post" action="uploadComic.php"
	 enctype="multipart/form-data">     
		<input type="hidden" name="MAX_FILE_SIZE" value="2097152">      <!-- MAX_FILE_SIZE protège côté client, mais il faudra aussi vérifier côté serveur au cas où.. -->
		<input type="file" name="uploaded_file">    
		<input type="submit" value="Envoyer">    
	</form>
		