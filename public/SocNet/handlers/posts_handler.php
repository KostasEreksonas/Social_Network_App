<?php
require_once '../SocNet/classes/Post.php';
if (isset($_POST["logout"])) {
    session_destroy();
    header("location: ../SocNet/login.php");
} elseif (isset($_POST["home"])) {
    header("location: ../SocNet/home.php");
} elseif (isset($_POST["post_button"])) {
    // Get post data
    $body = $_POST["post"];
    $username = $_SESSION["username"];
    $post = new Post();
    $post->createPost($body, $username);
}