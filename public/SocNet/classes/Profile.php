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