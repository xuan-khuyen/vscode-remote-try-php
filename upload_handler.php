<?php
// Include database connection and functions to sanitize input
include 'db_connection.php';
include 'sanitize_input.php';

// Check if file was uploaded without errors
if(isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0){
    $file_name = $_FILES["fileToUpload"]["name"];
    $file_type = $_FILES["fileToUpload"]["type"];
    $file_size = $_FILES["fileToUpload"]["size"];
    $file_tmp_name = $_FILES["fileToUpload"]["tmp_name"];
    $upload_date = date("Y-m-d H:i:s");
    
    // Generate new filename
    $encoded_file_name = date("ymdHis") . '_' . bin2hex(random_bytes(4)) . '.' . pathinfo($file_name, PATHINFO_EXTENSION);

    // Move uploaded file to upload directory
    move_uploaded_file($file_tmp_name, "upload/" . $encoded_file_name);

    // Insert file info into database
    $sql = "INSERT INTO upload_files (file_name, file_type, file_size, upload_date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $encoded_file_name, $file_type, $file_size, $upload_date);
    $stmt->execute();
    $stmt->close();

    // Redirect back to index.php
    header("Location: index.php");
    exit();
} else {
    echo "Error uploading file.";
}
?>
