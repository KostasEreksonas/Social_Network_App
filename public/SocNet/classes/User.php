<?php
require_once 'Database.php';
class User {
    private $db;

    public function __construct() {
        /*
         * Constructor method
         * Creates a database instance
         */
        $this->db = new Database();
    }

    public function validateEmail($email) : void
    {
        /*
         * Validate email format
         * Validate if email confirmation == email
         */
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email address format<br>");
        }
    }

    public function confirmEmail($email, $email_confirm) : void
    {
        if ($email !== $email_confirm) {
            throw new Exception("Emails do not match<br>");
        }
    }

    public function checkEmail($email) : void
    {
        /*
         * Check if email is already in use
         */
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $this->db->query($sql);
        $this->db->execute();
        $result = $this->db->rowCount();
        if ($result > 0) {
            throw new Exception("Email already in use<br>");
        }
    }

    public function validatePassword($password) : void
    {
        /*
         * Validate password length
         * Validate if password confirmation == password
         */
        if (strlen($password) < 5 || strlen($password) > 32)  {
            throw new Exception("Passwords must be between 5 and 32 characters<br>");
        }
    }

    public function confirmPassword($password, $password_confirm) : void
    {
        if ($password !== $password_confirm) {
            throw new Exception("Passwords do not match<br>");
        }
    }

    public function hashPassword($password) : string
    {
        /*
         * Hash a password before storing to a database
         */
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function registerUser($fname, $lname, $email, $password) : void
    {
        /*
         * Registers an user to the database
         */
        $sql = "INSERT INTO `users` VALUES (NULL, '$fname', '$lname', '$email', '$password', DEFAULT)";
        $this->db->query($sql);
        try {
            $this->db->execute();
            echo 'New record created successfully<br>';
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function login($email, $password) : void
    {
        /*
         * Login user to the application
         */
        $sql = "SELECT password FROM users WHERE email = '$email'";
        $this->db->query($sql);
        $result = $this->db->resultSet();
        if ($this->db->rowCount() == 0) {
            throw new Exception('No such user exists<br>');
        } else {
            foreach ($result as $row) {
                $dbPassword = $row->password;
            }
            if (!password_verify($password, $dbPassword)) {
                throw new Exception("Invalid username and/or password.<br>");
            } else {
                header('Location: home.php');
            }
        }
    }
}