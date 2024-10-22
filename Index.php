<?php
	include('IndexOperations.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Image Gallery</title>
</head>
<body>
<section>
	<div class="container">
        <div class="card">
			<div class="card-body">
				<?php
					$sql = "SELECT id, ImagePath FROM tblimages";
					$result = $conn->query($sql);
                    if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							// Display each image with a clickable link
							 echo '<a href="practice.php?imageId=' . $row['id'] . '">
                            <img src="' . htmlspecialchars($row['ImagePath']) . '" class="myImg" style="max-width: 50%; height: auto; cursor: pointer;"></a>';
						}
					} else {
						echo "No images found.";
					}

					// Fetch the logo
					$sql = "SELECT Logo FROM tblinfo";
					$res = $conn->query($sql);
					$row = $res->fetch_assoc();
				?>
		    </div>
		</div>
	</div>
</section>
</body>
</html> 