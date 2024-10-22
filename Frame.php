<?php 
include 'practiceOperations.php';
$imageToShow = '';
$businessInfo = [];

if (isset($_GET['imageId'])) {
    $imageId = intval($_GET['imageId']); 
    $imageToShow = fetchSelectedImage($conn, $imageId);
    $businessInfo = fetchBusinessInfo($conn);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<title>Banner Generator</title>
</head>
<body>
<section>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <?php if ($imageToShow): ?>
                    <div class="image-container" id="preview-section">
                        <img src="<?php echo $imageToShow; ?>" alt="Selected Image">
                        <img src="<?php echo htmlspecialchars($businessInfo['Logo']); ?>" alt="Logo" id="Logo" class="Logo" style="max-width: 120px; height: auto;">
                        <div class="overlay">
                            <h2><?php echo htmlspecialchars($businessInfo['BusinessName']); ?></h2>
						</div>
						<div class="contact-info">
								<p>Contact Number: <?php echo htmlspecialchars($businessInfo['ContactNumber']); ?></p>
								<p>Address: <?php echo htmlspecialchars($businessInfo['Address']); ?></p>
								<p>Email: <?php echo htmlspecialchars($businessInfo['Email']); ?></p>
								<p>Website: <a href="<?php echo htmlspecialchars($businessInfo['Website']); ?>" style="color: #007bff;"><?php echo htmlspecialchars($businessInfo['Website']); ?></a></p>
						</div>
                    </div>

                    <!-- Download button triggers preview first, then download -->
                    <button id="downloadBtn" class="download-button">Download Banner</button>

                <?php else: ?>
                    <p>No image selected.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('downloadBtn').addEventListener('click', function() {
    // Show the preview for 3 seconds before download starts
    const previewSection = document.getElementById('preview-section');
    
    // Display the preview frame (you can also add CSS animations if desired)
    previewSection.style.display = 'block';

    // Wait for 3 seconds, then start download
    setTimeout(function() {
        window.location.href = 'download.php?imageId=<?php echo intval($_GET["imageId"]); ?>'; // Trigger download
    }, 3000);  // 3-second delay
});
</script>

</body>
</html>
