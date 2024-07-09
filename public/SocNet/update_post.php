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
<form action="update_post.php" method="POST">
    <input type="submit" name="home" value="Home">
    <input type="submit" name="logout" value="Logout">
</form>
<h1>Update a post</h1>
<form action="update_post.php" method="POST">
    <label for="post">Update a post: </label><br>
    <textarea name="update_post" id="update_post" cols="30" rows="10"></textarea><br>
    <input type="submit" name="update_button" value="Update post">
</form>
</body>
</html>