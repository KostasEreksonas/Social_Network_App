<?php
require_once '../SocNet/classes/Post.php';
$post = new Post();
foreach ($_POST as $key => $value) {
    if (gettype($key) === 'integer') {
        $id = $key;
        $_SESSION['post_id'] = $id;
    }
}
$post_id = $_SESSION['post_id'];
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
} elseif (isset($_POST["update_button"])) {
    $body = $_POST["update_post"];
    $post->updatePost($post_id, $body);
} elseif (isset($_POST['delete_button'])) {
    $post->deletePost($post_id);
}