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
} elseif (isset($_POST["update_button"])) {
    $body = $_POST["update_post"];
    $post->updatePost($post_id, $body);
}