<?php
    require('connect.php');

class User{
    public $name;
    public $email;
    public $password;
    
    public function create(){
        $db = new Db();
        $avatar = rand(2, 20);
        $db -> query("INSERT INTO `users`( `name`, `email`, `password`, `role`, `avatar`) VALUES ('" . $this->name . "','" . $this->email . "','" . $this->password . "','User','" . $avatar . "');" );
  
        }
      
   public function checkIfUserExists(){
      $db = new Db();
      $rows[0]['name'] = "";
      $rows = $db -> select("SELECT name FROM `users` WHERE name = '" . $this->name ."';");
      
   if(isset($rows[0]['name'])){
        return true;
      }
    else{
        return false;
    }
   }
}



