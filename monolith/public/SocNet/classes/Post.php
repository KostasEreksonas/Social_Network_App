<?php
require_once 'Database.php';
class Post {
    protected $db;

    public function __construct ()
    {
        /*
         * Constructor method
         * Creates a database instance
         */
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
         * Returns all posts from an user
         */
        $sql = "SELECT `id`,`body` FROM posts where `added_by`='$username'";
        $this->db->query($sql);
        try {
            $result = $this->db->resultSet();
            foreach ($result as $row) {
                $id = $row->id;
                echo '<form class="post_box" action="update_post.php" method="POST">';
                echo '<p class="p-border">' . $row->body . ' <input type="submit" name="' . $id . '" value="Update"></p><br></form>';
                echo '<form class="post_box" action="delete_post.php" method="POST">';
                echo '<p class="p-border">' . $row->body . ' <input type="submit" name="' . $id . '" value="Delete"></p><br></form>';
            }
        } catch (PDOException $e) {
            echo $sql . '<br>' . $e->getMessage();
        }
    }

    public function updatePost($id, $body) : void
    {
        /*
         * Updates a post
         */
        $sql = "UPDATE `posts` SET `body`='$body' WHERE `id`='$id'";
        $this->db->query($sql);
        try {
            $this->db->execute();
            echo 'Post updated successfully<br>';
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

    public function deletePost($id) : void
    {
        /*
         * Delete a post
         */
        $sql = "DELETE FROM `posts` WHERE `id`='$id'";
        $this->db->query($sql);
        try {
            $this->db->execute();
            echo 'Post deleted<br>';
        } catch (PDOException $e) {
            echo $sql . '<br>' . $e->getMessage();
        }
    }
}