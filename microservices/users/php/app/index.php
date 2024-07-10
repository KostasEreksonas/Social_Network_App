<?php
ob_start();
session_start();
require_once 'handlers/login_handler.php';
?>

<form action="index.php" method="POST">
    <label for="email">Email: </label><br>
    <input type="email" id="email" name="log_email" placeholder="Email" required><br>
    <label for="password">Password: </label><br>
    <input type="password" id="password" name="log_password" placeholder="Password" required><br>
    <input type="submit" name="login_button" value="Login">
</form>
<a href="register.php">Don't have an account? Click here to register</a>
