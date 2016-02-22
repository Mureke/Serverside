<?php

class Post{
    public $postContent;
    public $userId;
    
    /*
     * Add new post to database
     */
    public function createPost(){
        $db = new Db();
        $db -> query("INSERT INTO `posts`( `post`, `userId`) VALUES ('" . $this->postContent . "','" . $this->userId . "');" );
  
        }

    /*
        Show posts from database, needs fixing
    */
        
    public function showPosts(){
        $db = new Db();
        $rows = $db->query("SELECT postId AS postId, post AS post, userId AS user FROM posts");

        echo '<table><tr><td>' . $rows['postId'] . '</td><td>' . $rows['post'] . '</td><td>' . $rows['user'] . '</td></tr></table>';
    
    }
}
?>