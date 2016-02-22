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
}
?>