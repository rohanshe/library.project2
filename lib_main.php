<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo "<script>alert('Please log in first!'); window.location.href='login.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Library</title>
</head>
<body>
    <h2>Welcome to the Library, <?php echo $_SESSION['user']; ?>!</h2>
    <a href="logout.php">Logout</a>
</body>
</html>
