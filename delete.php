<?php
// Include database connection
include 'db_connection.php';

// Get file ID from URL parameter
$file_id = $_GET['id'];

// Get file information from database
$sql = "SELECT file_name FROM upload_files WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $file_id);
$stmt->execute();
$stmt->bind_result($file_name);
$stmt->fetch();
$stmt->close();

// Delete file from database
$sql = "DELETE FROM upload_files WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $file_id);
$stmt->execute();
$stmt->close();

// Delete file from server
unlink("upload/" . $file_name);

// Redirect back to index.php
header("Location: index.php");
exit();
?>
