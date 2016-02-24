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
        Shows posts from database
    */
        
    public function showPosts(){
        $db = new Db();
        $rows = $db->select("SELECT 
                                p.post as post,
                                p.userId as userid,
                                u.id as id,
                                u.name as name,
                                u.avatar as avatar
                            FROM 
                                posts p,
                                users u
                            WHERE 
                                p.userId=u.id
                            ORDER BY post_date DESC;"
                            );

        return $rows;
    
    }
}
?>