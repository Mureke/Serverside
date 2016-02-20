<?php
    require('connect.php');

class User{
    public $name;
    public $email;
    public $password;
    // INSERT INTO `users`( `name`, `email`, `password`, `role`, `avatar`) VALUES ('admin','lol@lol.fi','admin','admin',3)
        
    public function create(){
        $db = new Db();
        $avatar = rand(2, 20);
        $db -> query("INSERT INTO `users`( `name`, `email`, `password`, `role`, `avatar`) VALUES ('" . $this->name . "','" . $this->email . "','" . $this->password . "','User','" . $avatar . "');" );
        echo $avatar;
        $this->result = $db;
       }
      
    }
  


