<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include('config.php');

$id = $_GET['id'];
$sql = "SELECT * FROM books WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $book = $result->fetch_assoc();
} else {
    echo "Book not found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    $sql = "UPDATE books SET title='$title', author='$author', year='$year' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
    <form method="POST" action="edit.php?id=<?php echo $id; ?>">
        <label>Title:</label><input type="text" name="title" value="<?php echo $book['title']; ?>" required><br>
        <label>Author:</label><input type="text" name="author" value="<?php echo $book['author']; ?>" required><br>
        <label>Year:</label><input type="number" name="year" value="<?php echo $book['year']; ?>" required><br>
        <button type="submit">Update Book</button>
    </form>
</body>
</html>
