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
	$stmt = $conn->prepare('SELECT * FROM images');
	$stmt->execute();
	$imageList = $stmt->fetchAll();

	foreach ($imageList as $image){
		?>
		<img src="<?= $image['image'] ?>" title="<?= $image['name'] ?>" width="500" height="500">
		<?php
	}
	?>
</body>
</html>