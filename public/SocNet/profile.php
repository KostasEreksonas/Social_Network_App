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
    <title>Profile</title>
</head>
<body>
<h4>Navigation</h4>
<form action="profile.php" method="POST">
    <input type="submit" name="home" value="Home">
    <input type="submit" name="logout" value="Logout">
</form>
<h1>Current Information</h1>
<h4>Profile Picture</h4>
<img src="<?php echo $_SESSION["profilePic"]; ?>" alt="Profile Picture">
<table>
    <tr>
        <th></th>
        <th>Current Information</th>
    </tr>
    <tr>
        <td>First Name</td>
        <td><?php echo $_SESSION["firstName"];?></td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td><?php echo $_SESSION["lastName"];?></td>
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
        <td>Deactivated</td>
        <td><?php echo $_SESSION["deactivated"];?></td>
    </tr>
    <tr>
        <td>Created At</td>
        <td><?php echo $_SESSION["createdAt"];?></td>
    </tr>
    <tr>
        <td>Profile Picture</td>
        <td><?php echo $_SESSION["profilePic"];?></td>
    </tr>
</table>
<h1>Update User Information</h1>
<form action="profile.php" method="POST">
    <label for="fname">Update first name: </label><br>
    <input type="text" id="fname" name="reg_fname" placeholder="First Name" required><br>
    <label for="lname">Update last name: </label><br>
    <input type="text" id="lname" name="reg_lname" placeholder="Last Name" required><br>
    <label for="email">New email: </label><br>
    <input type="email" id="email" name="reg_email" placeholder="Email" required><br>
    <label for="email_repeat">Confirm new email: </label><br>
    <input type="email" id="email_repeat" name="reg_email_confirm" placeholder="Confirm Email" required><br>
    <label for="password">New password: </label><br>
    <input type="password" id="password" name="reg_password" placeholder="Password" required><br>
    <label for="password_repeat">Confirm new password: </label><br>
    <input type="password" id="password_repeat" name="reg_password_confirm" placeholder="Confirm Password" required><br>
    <input type="submit" name="update_button" value="Update">
    <input type="submit" name="deactivate" value="Deactivate Profile">
    <input type="submit" name="delete" value="Delete Profile">
</form>
</body>
</html>