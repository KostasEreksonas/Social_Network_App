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
            echo 'Record updated successfully<br>';
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}