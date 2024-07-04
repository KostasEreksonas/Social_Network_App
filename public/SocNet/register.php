<?php
require_once 'handlers/register_handler.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Social Network</title>
</head>
<body>
<form action="register.php" method="POST">
    <label for="fname">First Name: </label><br>
    <input type="text" id="fname" name="fname" placeholder="First Name" required><br>
    <label for="lname">Last Name: </label><br>
    <input type="text" id="lname" name="lname" placeholder="Last Name" required><br>
    <label for="email">Email: </label><br>
    <input type="email" id="email" name="email" placeholder="Email" required><br>
    <label for="email_repeat">Confirm Email: </label><br>
    <input type="email" id="email_repeat" name="email_repeat" placeholder="Confirm Email" required><br>
    <label for="password">Password: </label><br>
    <input type="password" id="password" name="password" placeholder="Password" required><br>
    <label for="password_repeat">Confirm Password: </label><br>
    <input type="password" id="password_repeat" name="password_repeat" placeholder="Confirm Password" required><br>
    <input type="submit" name="register_button" value="Register">
</form>
</body>
</html>
