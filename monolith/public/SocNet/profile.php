<?php
session_start();
require_once("handlers/profile_handler.php");
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
<img src="<?php echo $_SESSION["profile_pic"]; ?>" alt="Profile Picture">
<table>
    <tr>
        <th></th>
        <th>Current Information</th>
    </tr>
    <tr>
        <td>ID</td>
        <td><?php echo $_SESSION["id"];?></td>
    </tr>
    <tr>
        <td>First Name</td>
        <td><?php echo $_SESSION["first_name"];?></td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td><?php echo $_SESSION["last_name"];?></td>
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
        <td><?php echo $_SESSION["created_at"];?></td>
    </tr>
    <tr>
        <td>Profile Picture</td>
        <td><?php echo $_SESSION["profile_pic"];?></td>
    </tr>
</table>
<h1>Update User Information</h1>
<form action="profile.php" method="POST">
    <label for="fname">Update first name: </label><br>
    <input type="text" id="fname" name="upd_fname" placeholder="First Name"><br>
    <label for="lname">Update last name: </label><br>
    <input type="text" id="lname" name="upd_lname" placeholder="Last Name"><br>
    <label for="email">New email: </label><br>
    <input type="email" id="email" name="upd_email" placeholder="Email"><br>
    <label for="email_repeat">Confirm new email: </label><br>
    <input type="email" id="email_repeat" name="upd_email_confirm" placeholder="Confirm Email"><br>
    <label for="password">New password: </label><br>
    <input type="password" id="password" name="upd_password" placeholder="Password"><br>
    <label for="password_repeat">Confirm new password: </label><br>
    <input type="password" id="password_repeat" name="upd_password_confirm" placeholder="Confirm Password"><br>
    <label for="upd_profile_pic">Choose a profile picture color to update:</label><br>
    <select name="upd_profile_pic" id="upd_profile_pic">
        <option value="none">None</option>
        <option value="emerald">Emerald</option>
        <option value="pomegranate">Pomegranate</option>
        <option value="red">Red</option>
        <option value="turqoise">Turqoise</option>
    </select><br>
    <input type="submit" name="update_button" value="Update">
    <input type="submit" name="deactivate" value="Deactivate Profile">
    <input type="submit" name="delete" value="Delete Profile">
</form>
</body>
</html>