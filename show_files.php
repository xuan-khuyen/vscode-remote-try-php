<?php
// Include database connection
include 'db_connection.php';

// Sort files based on user selection
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'name';
if ($sort == 'name') {
    $sql = "SELECT * FROM upload_files ORDER BY file_name";
} elseif ($sort == 'upload_date') {
    $sql = "SELECT * FROM upload_files ORDER BY upload_date";
}
$result = $conn->query($sql);

// Display files
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['file_name'] . "</td>";
        echo "<td>" . $row['upload_date'] . "</td>";
        echo "<td>" . $row['file_type'] . "</td>";
        echo "<td>" . $row['file_size'] . " bytes</td>";
        echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No files uploaded yet.</td></tr>";
}
?>
