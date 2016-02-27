<?php

class Comments{
      public $comment;
      public $postId;
      public $userId;
    
    public function create(){
        $db = new Db();
        $db -> query("INSERT INTO `comments`( `comment`, `userId`, 'postId') VALUES ('" . $this->comment . "','" . $this->userId . "','". $this->postId . "');" );
    }
    
    public function showcomments(){
        
    }
}