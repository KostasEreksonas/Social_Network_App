<?php

require_once '../SocNet/classes/User.php';

if (isset($_POST["login_button"])) {
    $email = $_POST['log_email'];
    $password = $_POST['log_password'];

    $user = new User();
    try {
        $user->login($email, $password);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage() . '<br>';
    }
}