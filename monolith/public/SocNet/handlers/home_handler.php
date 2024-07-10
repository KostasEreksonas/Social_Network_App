<?php
session_start();
// Destroy session after pressing logout button
if (isset($_POST["logout"])) {
    session_destroy();
    header("location: ../SocNet/login.php");
} elseif (isset($_POST["messages"])) {
    header("location: ../SocNet/messages.php");
}  elseif (isset($_POST["friends"])) {
header("location: ../SocNet/friends.php");
} elseif (isset($_POST["profile"])) {
header("location: ../SocNet/profile.php");
} elseif (isset($_POST["posts"])) {
header("location: ../SocNet/posts.php");
}