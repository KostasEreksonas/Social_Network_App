<?php
require_once '../SocNet/classes/Post.php';
$post = new Post();
if (isset($_POST["logout"])) {
    session_destroy();
    header("location: ../SocNet/login.php");
} elseif (isset($_POST["home"])) {
    header("location: ../SocNet/home.php");
} elseif (isset($_POST["post_button"])) {
    // Get post data
    $body = $_POST["post"];
    $username = $_SESSION["username"];
    $post->createPost($body, $username);
} elseif (isset($_POST["show_posts"])) {
    $username = $_SESSION["username"];
    $post->getPosts($username);
    echo 'Post count: ' . $post->countPosts($username);
}