<?php
session_start();
require_once("handlers/profile_handler.php");
echo 'This is place for your profile, '. $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Messages</title>
</head>
<body>
<h4>Navigation</h4>
<form action="profile.php" method="POST">
    <input type="submit" name="home" value="Home">
    <input type="submit" name="logout" value="Logout">
    <input type="submit" name="deactivate" value="Deactivate Profile">
    <input type="submit" name="delete" value="Delete Profile">
</form>
<h1>Current Information</h1>
<table>
    <tr>
        <th></th>
        <th>Current Information</th>
    </tr>
    <tr>
        <td>First Name</td>
        <td>PLACEHOLDER</td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td>PLACEHOLDER</td>
    </tr>
    <tr>
        <td>Username</td>
        <td><?php echo $_SESSION["username"];?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo $_SESSION["email"];?></td>
    </tr>
    <tr>
        <td>Profile Picture</td>
        <td>PLACEHOLDER</td>
    </tr>
</table>
<h1>Update User Information</h1>
<form action="profile.php" method="POST">
    <label for="fname">First Name: </label><br>
    <input type="text" id="fname" name="reg_fname" placeholder="First Name" required><br>
    <label for="lname">Last Name: </label><br>
    <input type="text" id="lname" name="reg_lname" placeholder="Last Name" required><br>
    <label for="email">Email: </label><br>
    <input type="email" id="email" name="reg_email" placeholder="Email" required><br>
    <label for="email_repeat">Confirm Email: </label><br>
    <input type="email" id="email_repeat" name="reg_email_confirm" placeholder="Confirm Email" required><br>
    <label for="password">Password: </label><br>
    <input type="password" id="password" name="reg_password" placeholder="Password" required><br>
    <label for="password_repeat">Confirm Password: </label><br>
    <input type="password" id="password_repeat" name="reg_password_confirm" placeholder="Confirm Password" required><br>
    <input type="submit" name="update_button" value="Update">
</form>
</body>
</html>