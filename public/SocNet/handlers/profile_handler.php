<?php
require_once '../SocNet/classes/Profile.php';

if (isset($_POST["logout"])) {
    session_destroy();
    header("location: ../SocNet/login.php");
} elseif (isset($_POST["home"])) {
    header("location: ../SocNet/home.php");
} elseif (isset($_POST["deactivate"])) {
    echo 'Destroy session, logout and set profile deactivation bit on a database to 1';
} elseif (isset($_POST["delete"])) {
    echo 'Destroy session, logout and delete user info from the database';
}
