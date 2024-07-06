<?php
require_once '../SocNet/classes/Profile.php';

// Program buttons
if (isset($_POST["logout"])) {  // Logout
    session_destroy();
    header("location: ../SocNet/login.php");
} elseif (isset($_POST["home"])) { // Go to home page
    header("location: ../SocNet/home.php");
} elseif (isset($_POST["deactivate"])) { // Deactivate user
    $profile = new Profile();
    $profile->deactivateUser($_SESSION['id']);
    unset($profile);
} elseif (isset($_POST["delete"])) { // Delete user
    $profile = new Profile();
    $profile->deleteUser($_SESSION['id']);
    unset($profile);
} elseif (isset($_POST["update_button"])) {
    // Get form data
    $fname = $_POST["upd_fname"];
    $lname = $_POST["upd_lname"];
    $email = $_POST["upd_email"];
    $email_confirm = $_POST["upd_email_confirm"];
    $password = $_POST["upd_password"];
    $password_confirm = $_POST["upd_password_confirm"];
    $profile_pic = $_POST["upd_profile_pic"];
    // Instantiate new profile object
    $profile = new Profile();
    // Count exceptions
    $count = 0;
    if (!empty($email)) {
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
    }
    if (!empty($password)) {
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
    }
    if ($count == 0) {
        //echo 'Determine fields to update';
        if (!empty($fname)) {
            $profile->updateColumn('first_name', $fname, $_SESSION['id']);
        }
        if (!empty($lname)) {
            $profile->updateColumn('last_name', $lname, $_SESSION['id']);
        }
        if (!empty($email)) {
            $profile->updateColumn('email', $email, $_SESSION['id']);
        }
        if (!empty($password)) {
            $hashedPassword = $profile->hashPassword($password);
            $profile->updateColumn('password', $hashedPassword, $_SESSION['id']);
        }
        if ($profile_pic !== 'none') {
            $path = 'assets/img/defaults/head_' . $profile_pic . '.png';
            $profile->updateColumn('profile_pic', $path, $_SESSION['id']);
        }
        unset($profile);
    } else {
        echo 'Incorrect or missing data';
        unset($profile);
    }
}