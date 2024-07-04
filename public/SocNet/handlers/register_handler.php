<?php

if (isset($_POST["register_button"])) {
    //Declaring variables to prevent errors
    $fname = ""; //First name
    $lname = ""; //Last name
    $em = ""; //email
    $em2 = ""; //email 2
    $password = ""; //password
    $password2 = ""; //password 2
    $date = ""; //Sign up date
    /*
     * Clean data
     */
    // First Name
    $fname = strip_tags($_POST["fname"]); // Remove html tags
    $fname = str_replace(" ", "", $fname); // Remove spaces
    $fname = ucfirst(strtolower($fname)); // Capitalize first name
    $_SESSION["fname"] = $fname; // Store first name into Session variable

    // Last Name
    $lname = strip_tags($_POST["lname"]); // Remove html tags
    $lname = str_replace(" ", "", $lname); // Remove spaces
    $lname = ucfirst(strtolower($lname)); // Capitalize first name
    $_SESSION["lname"] = $lname; // Store first name into Session variable
}