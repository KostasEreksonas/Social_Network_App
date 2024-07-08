<?php
require_once 'Database.php';
class Post {
    protected $db;

    public function __construct ()
    {
        $this->db = new Database();
    }

    public function createPost() : void
    {
        /*
         * Creates a post and record it in a database
         */
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