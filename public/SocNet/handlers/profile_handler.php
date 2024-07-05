<?php
require_once '../SocNet/classes/Profile.php';

// Program buttons
if (isset($_POST["logout"])) {
    session_destroy();
    header("location: ../SocNet/login.php");
} elseif (isset($_POST["home"])) {
    header("location: ../SocNet/home.php");
} elseif (isset($_POST["deactivate"])) {
    echo 'Destroy session, logout and set profile deactivation bit on a database to 1';
} elseif (isset($_POST["delete"])) {
    echo 'Destroy session, logout and delete user info from the database';
} elseif (isset($_POST["update_button"])) {
    // Get form data
    $fname = $_POST["upd_fname"];
    $lname = $_POST["upd_lname"];
    $email = $_POST["upd_email"];
    $email_confirm = $_POST["upd_email_confirm"];
    $password = $_POST["upd_password"];
    $password_confirm = $_POST["upd_password_confirm"];
    // Instantiate new profile object
    $profile = new Profile();
    // Count exceptions
    $count = 0;
    // Validate email
    try {
        $profile->validateEmail($email);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        $count++;
    }
    // Confirm email
    try {
        $profile->confirmEmail($email, $email_confirm);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        $count++;
    }
    // Check if an email is in use
    try {
        $profile->checkEmail($email);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        $count++;
    }
    // Validate password
    try {
        $profile->validatePassword($password);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        $count++;
    }
    // Confirm password
    try {
        $profile->confirmPassword($password, $password_confirm);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        $count++;
    }
    if ($count == 0) {
        echo empty($fname);
    } else {
        echo 'Incorrect or missing data';
        unset($profile);
    }
}