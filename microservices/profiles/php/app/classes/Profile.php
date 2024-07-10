<?php
require_once 'User.php';
class Profile extends User {
    public function updateColumn($column, $name, $id) : void
    {
        /*
         * Update column of database
         */
        $sql = "UPDATE `users` SET $column = '$name' WHERE `id` = $id";
        $this->db->query($sql);
        try {
            $this->db->execute();
            $_SESSION[$column] = $name;
            echo 'Record updated successfully<br>';
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function updateUsername($fname, $lname, $id) : string
    {
        /*
         * Updates username after changing first name, last name or both
         */
        $sql = "SELECT username FROM users WHERE id = '$id'";
        $this->db->query($sql);
        $str = $this->db->single()->username;
        $arr = explode("_", $str);
        if (empty($fname) && empty($lname)) {
            $username = $str;
        } elseif (!empty($fname) && empty($lname)) {
            $arr[0] = strtolower($fname);
            $username = $arr[0] . '_' . $arr[1];
        } elseif (empty($fname) && !empty($lname)) {
            $arr[1] = strtolower($lname);
            $username = $arr[0] . '_' . $arr[1];
        } elseif (!empty($lname) && !empty($fname)) {
            $username = $this->createUsername($fname, $lname);
        }
        return $username;
    }

    public function deactivateUser($id) : void
    {
        /*
         * Sets a 'deactivated' bit on a database to 1
         */
        $sql = "UPDATE `users` SET `deactivated` = 1 WHERE `id` = '$id'";
        $this->db->query($sql);
        try {
            $this->db->execute();
            echo 'User deactivated successfully<br>';
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function deleteUser($id) : void
    {
        /*
         * Delete user record from the database
         */
        $sql = "DELETE FROM `users` where `id` = '$id'";
        $this->db->query($sql);
        try {
            $this->db->execute();
            session_destroy();
            header("Location: index.php");
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}