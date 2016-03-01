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
        $db = new Db();

        $q ="SELECT 
                c.comment as comment,
                c.userId as commentuserid,
                c.postId as commentpostid,
                u.id as id,
                u.name as name,
                u.avatar as avatar
             FROM 
                comments c,
                users u
             WHERE
                c.userId = u.id
             ORDER BY comment_date ASC;";

           $rows = $db->select($q);

        return $rows;
    }
    
    public function searchComments($array, $key, $value)
    {
    $results = array();

    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }

        foreach ($array as $subarray) {
            $results = array_merge($results, $this->searchComments($subarray, $key, $value));
        }
    }

    return $results;
    }
}