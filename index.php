<!doctype html>
<html>
	<head>
		<title>Upload Multiple Image files to the Database using PDO - PHP</title>
		<?php 
		include "config.php";
		
		if(isset($_POST['submit'])){

			// Count total files
			$countfiles = count($_FILES['files']['name']);
			
			// Prepared statement
			$query = "INSERT INTO images (name,image) VALUES(?,?)";

			$statement  = $conn->prepare($query);

			// Loop all files
			for($i=0;$i<$countfiles;$i++){

				// File name
			   	$filename = $_FILES['files']['name'][$i];

			   	// Get extension
          		$ext = end((explode(".", $filename)));

          		// Valid image extension
          		$valid_ext = array("png","jpeg","jpg");

          		if(in_array($ext, $valid_ext)){

          			// Upload file
				   	if(move_uploaded_file($_FILES['files']['tmp_name'][$i],'upload/'.$filename)){

				   		// Execute query
						$statement->execute(array($filename,'upload/'.$filename));

					}
          		}
			   	
			}
			echo "File upload successfully";
		}
		?>
	</head>
	<body>
		<form method='post' action='' enctype='multipart/form-data'>
			<input type='file' name='files[]' multiple />
			<input type='submit' value='Submit' name='submit' />
		</form>
	</body>
</html>