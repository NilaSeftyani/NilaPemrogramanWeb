<?php 
include '../header.php';

$id = $_GET['id'];

// Prepared statement to prevent SQL injection
$stmt = $conn->prepare("DELETE FROM tblBerita WHERE idBerita = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
include '../footer.php';
?>
