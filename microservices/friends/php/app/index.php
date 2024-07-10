<?php
session_start();
require_once("handlers/form_handler.php");
echo 'This is place for your friends list, '. $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Friends</title>
</head>
<body>
<form action="index.php" method="POST">
    <input type="submit" name="home" value="Home">
    <input type="submit" name="logout" value="Logout">
</form>

</body>
</html>
