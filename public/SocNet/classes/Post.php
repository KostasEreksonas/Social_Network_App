<?php
require_once 'Database.php';
class Post {
    protected $db;

    public function __construct ()
    {
        $this->db = new Database();
    }

    public function createPost($body, $username) : void
    {
        /*
         * Creates a post and record it in a database
         */
        $sql = "INSERT INTO `posts` VALUES (NULL, '$body', '$username', DEFAULT, DEFAULT)";
        $this->db->query($sql);
        try {
            $this->db->execute();
            echo 'New post created successfully<br>';
        } catch (PDOException $e) {
            echo $sql . '<br>' . $e->getMessage();
        }
    }

    public function getPosts($username) : void
    {
        /*
         * Returns all posts for an user
         */
        $sql = "SELECT `body` FROM posts where `added_by`='$username'";
        $this->db->query($sql);
        try {
            $result = $this->db->resultSet();
            foreach ($result as $row) {
                echo '<p class="p-border">' . $row->body . '</p><br>';
            }
        } catch (PDOException $e) {
            echo $sql . '<br>' . $e->getMessage();
        }
    }

    public function countPosts($username) : int
    {
        /*
         * Return count of user posts
         */
        $sql = "SELECT body FROM posts WHERE `added_by`='$username'";
        $this->db->query($sql);
        try {
            $this->db->execute();
            $result = $this->db->rowCount();
        } catch (PDOException $e) {
            echo $sql . '<br>' . $e->getMessage();
        }
        return $result;
    }
}