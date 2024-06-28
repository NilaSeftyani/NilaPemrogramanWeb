<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include('config.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Management</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user']; ?>!</h1>
    <a href="logout.php">Logout</a>

    <h2>Books</h2>
    <form method="GET" action="index.php">
        <input type="text" name="search" placeholder="Search books">
        <button type="submit">Search</button>
    </form>

    <a href="creat.php">Add Book</a>

    <?php
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $sql = "SELECT * FROM books WHERE title LIKE '%$search%' OR author LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['title'] . " by " . $row['author'] . " (" . $row['year'] . ") - <a href='edit.php?id=" . $row['id'] . "'>Edit</a> - <a href='delete.php?id=" . $row['id'] . "'>Delete</a></li>";
        }
        echo "</ul>";
    } else {
        echo "No books found.";
    }
    ?>
</body>
</html>
