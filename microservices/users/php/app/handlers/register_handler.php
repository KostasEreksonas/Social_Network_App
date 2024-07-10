<?php

require_once(realpath(dirname(__FILE__) . '/../classes/User.php'));

// Count exceptions
$count = 0;

if (isset($_POST["register_button"])) {
    // Get form data
    $fname = $_POST["reg_fname"];
    $lname = $_POST["reg_lname"];
    $email = $_POST["reg_email"];
    $email_confirm = $_POST["reg_email_confirm"];
    $password = $_POST["reg_password"];
    $password_confirm = $_POST["reg_password_confirm"];

    /*
     * Create a new User object and perform data validation checks
     */
    $user = new User();
    // Validate email
    try {
        $user->validateEmail($email);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        $count++;
    }
    // Confirm email
    try {
        $user->confirmEmail($email, $email_confirm);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        $count++;
    }
    // Check if an email is in use
    try {
        $user->checkEmail($email);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        $count++;
    }
    try {
        $user->validatePassword($password);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        $count++;
    }
    try {
        $user->confirmPassword($password, $password_confirm);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        $count++;
    }
    if ($count == 0) {
        $username = $user->createUsername($fname, $lname);
        $hashedPassword = $user->hashPassword($password);
        $user->registerUser($fname, $lname, $username, $email, $hashedPassword);
        unset($user);
    } else {
        echo 'Incorrect or missing data.';
        unset($user);
    }
}
