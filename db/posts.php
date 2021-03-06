<?php

class Post{
    public $postContent;
    public $userId;
    public $postNumber;
    
    /*
     * Add new post to database
     */
    public function createPost(){
        $db = new Db();
        $this->postContent = $db->stripInput($this->postContent);
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
                                p.postId as postid,
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

    /*
        Allows post owner to delete his/her own posts 
    */

    public function deletePost(){
        $db = new Db();
        $db->query("DELETE FROM
                        posts
                    WHERE
                        postId = ". $this->postNumber . ";"
            );   
    }

    /*
        Allows post owner to modify his/her own posts
    */

    public function editPost(){

        $db = new Db();
        $this->postContent = $db->stripInput($this->postContent);
        $db->query("UPDATE
                        posts
                    SET
                        post = '" . $this->postContent . "'
                    WHERE
                        postId = " . $this->postNumber . ";"           
                    );       
    }
}
?>