<?php
	
include "config.php";

if(isset($_POST['submit'])) {

	// Comptage des fichiers images insérés
	$countfiles = count($_FILES['files']['name']);

	// Prepared statement
	$query = "INSERT INTO images(name, image) VALUES(?,?)";
	$statement = $conn->prepare($query);

	// Boucle pour l'insertion des images
	for($i = 0;$i<$countfiles; $i++){
		//Nom du fichier image
		$filename = $_FILES['files']['name'][$i];

		// Emplacement du fichier
		$target_file = "upload"/.$filename;

		// Extension du fichier
		$file_extension = pathinfo($target_file,PATHINFO_EXTENSION);
		$file_extension = strtolower($file_extension);

		// Triage des extension de fichier valides
		$valid_extension = array("png","jpeg","jpg");

		if(in_array($file_extension,$valid_extension)){
			// Upload des fichiers images
			if(move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)){

				//Execution de la requête
				$statement->execute(array($filename,$target_file));

			}

		}
	}


}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Image</title>
</head>
<body>

	<form method="post" action="" enctype="multipart/form-data">
		<input type="file" name="files[]" multiple>
		<input type="submit" name="sumbit" value="Upload">
	</form>

</body>
</html>