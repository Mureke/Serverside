<?php

class Comment{
      public $comment;
      public $postId;
      public $userId;
    
    public function create(){
        $db = new Db();
        $this->comment = $db->stripInput($this->comment);
          $db -> query("INSERT INTO `comments`( `comment`, `userId`, `postId`) VALUES ('" . $this->comment . "','" . $this->userId . "','" . $this->postId ."');" );
    }
    
    public function showcomments(){
        
    }
}