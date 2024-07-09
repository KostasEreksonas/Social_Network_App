<?php
session_start();
require_once("handlers/posts_handler.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Posts</title>
</head>
<body>
<form action="delete_post.php" method="POST">
    <input type="submit" name="home" value="Home">
    <input type="submit" name="logout" value="Logout">
</form>
<h1>Delete a post</h1>
<form action="delete_post.php" method="POST">
    <label for="post">Delete this post?</label><br>
    <input type="submit" name="delete_button" value="Delete post">
</form>
</body>
</html>