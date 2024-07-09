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

    public function getPosts() : string
    {
        /*
         * Returns all posts for an user
         */
        return 'posts';
    }

    public function getPost() : string
    {
        /*
         * Return a specific post from an user based on condition(s)
         */
        return 'post';
    }

    public function countPosts() : int
    {
        /*
         * Return count of user posts
         */
        return 1;
    }
}