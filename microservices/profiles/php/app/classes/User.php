<?php
require_once 'Database.php';
class User {
    protected $db;

    public function __construct()
    {
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
         */
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email address format<br>");
        }
    }

    public function confirmEmail($email, $email_confirm) : void
    {
        /*
         * Confirm if emails match
         */
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
         */
        if (strlen($password) < 5 || strlen($password) > 32)  {
            throw new Exception("Passwords must be between 5 and 32 characters<br>");
        }
    }

    public function confirmPassword($password, $password_confirm) : void
    {
        /*
         * Confirm if passwords match
         */
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

    public function createUsername($fname, $lname) : string
    {
        /*
         * Create an username for registering user
         */
        $username = strtolower($fname) . '_' . strtolower($lname);
        // Check if username already exists
        $this->db->query("SELECT * FROM users WHERE username = '$username'");
        $this->db->execute();
        $count = $this->db->rowCount();
        if ($count > 0) {
            $username = strtolower($fname) . '_' . strtolower($lname) . '_' . $count;
        }
        return $username;
    }

    public function registerUser($fname, $lname, $username, $email, $password) : void
    {
        /*
         * Registers an user to the database
         */
        $sql = "INSERT INTO `users` VALUES (NULL, '$fname', '$lname', '$username', '$email', '$password', DEFAULT, DEFAULT, DEFAULT, DEFAULT)";
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
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $this->db->query($sql);
        $result = $this->db->resultSet();
        if ($this->db->rowCount() == 0) {
            throw new Exception('No such user exist<br>');
        } else {
            foreach ($result as $row) {
                $id = $row->id;
                $firstName = $row->first_name;
                $lastName = $row->last_name;
                $username = $row->username;
                $dbPassword = $row->password;
                $profilePic = $row->profile_pic;
                $deactivated = $row->deactivated;
                $createdAt = $row->created_at;
            }
            if (!password_verify($password, $dbPassword)) {
                throw new Exception("Invalid username and/or password.<br>");
            } elseif ($deactivated == 1) {
                throw new Exception("User deactivated. Contact system administrator for profile reactivation.<br>");
            } else {
                $_SESSION['id'] = $id;
                $_SESSION['first_name'] = $firstName;
                $_SESSION['last_name'] = $lastName;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['profile_pic'] = $profilePic;
                $_SESSION['deactivated'] = $deactivated;
                $_SESSION['created_at'] = $createdAt;
                header('Location: home.php');
            }
        }
    }
}
