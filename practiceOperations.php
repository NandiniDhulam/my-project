<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "adbanao_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch selected image by ID
function fetchSelectedImage($conn, $imageId) {
    $stmt = $conn->prepare("SELECT ImagePath FROM tblimages WHERE id = ?");
    $stmt->bind_param("i", $imageId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $imageToShow = '';
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imageToShow = htmlspecialchars($row['ImagePath']); 
    }
    $stmt->close();
    
    return $imageToShow;
}

// Function to fetch business information
function fetchBusinessInfo($conn) {
    $sqlInfo = "SELECT * FROM tblinfo LIMIT 1"; 
    $infoResult = $conn->query($sqlInfo);
    
    $businessInfo = [];
    if ($infoResult->num_rows > 0) {
        $businessInfo = $infoResult->fetch_assoc(); 
    }
    
    return $businessInfo;
}
?>
