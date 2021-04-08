<?php

include "config.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
	<?php
	$stmt = $con->prepare('SELECT * FROM images');
	$stmt->execute();
	$imageList = $stmt->fetchAll();

	foreach ($imageList as $image){
		?>
		<img src="<?= $image['image'] ?>" title="<?= $image['name'] ?>" width="200" height="200">
		<?php
	}
	?>
</body>
</html>