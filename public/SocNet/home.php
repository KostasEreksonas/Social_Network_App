<?php
require_once 'handlers/home_handler.php';
session_start();
echo 'Hello, ' . $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Home</title>
</head>
<body>
<form action="home.php" method="POST">
    <input type="submit" name="messages" value="Messages">
    <input type="submit" name="friends" value="Friends">
    <input type="submit" name="profile" value="Profile">
    <input type="submit" name="posts" value="Posts">
    <input type="submit" name="logout" value="Logout">
</form>
</body>
</html>