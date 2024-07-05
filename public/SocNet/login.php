<?php
require_once 'handlers/login_handler.php';
require_once 'classes/Database.php';
?>

<form action="login.php" method="POST">
    <label for="email">Email: </label><br>
    <input type="email" id="email" name="log_email" placeholder="Email" required><br>
    <label for="password">Password: </label><br>
    <input type="password" id="password" name="log_password" placeholder="Password" required><br>
    <input type="submit" name="login_button" value="Login">
</form>
<a href="register.php">Don't have an account? Click here to register</a>