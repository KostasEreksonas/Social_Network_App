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
<form action="posts.php" method="POST">
    <input type="submit" name="show_posts" value="Show Posts">
</form>
<form action="posts.php" method="POST">
    <input type="submit" name="home" value="Home">
    <input type="submit" name="logout" value="Logout">
</form>
<h1>Create a post</h1>
<form action="posts.php" method="POST">
    <label for="post">Write a post: </label><br>
    <textarea name="post" id="post" cols="30" rows="10"></textarea><br>
    <input type="submit" name="post_button" value="Create post">
</form>
</body>
</html>