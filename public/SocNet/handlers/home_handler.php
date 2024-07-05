<?php
session_start();
// Destroy session after pressing logout button
if (isset($_POST["logout"])) {
    session_destroy();
    header("location: ../SocNet/login.php");
}