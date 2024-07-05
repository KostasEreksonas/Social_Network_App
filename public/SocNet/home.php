<?php
require_once 'handlers/home_handler.php';
session_start();
echo 'Hello, ' . $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
<form action="home.php" method="POST">
    <input type="submit" name="logout" value="Logout">
</form>
</body>
</html>
