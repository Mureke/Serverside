<?php
    require('connect.php');

class User{
    public $name;
    public $email;
    public $password;
    
    /*
     * Add new user to database
     */
    public function create(){
        $db = new Db();
        $avatar = rand(2, 20);
        $db -> query("INSERT INTO `users`( `name`, `email`, `password`, `role`, `avatar`) VALUES ('" . $this->name . "','" . $this->email . "','" . $this->password . "','User','" . $avatar . "');" );
  
        }
   /*
    * This method is used to check if username already exists in database
    */
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
   
   public function login(){
    $db = new Db();
    $password = md5($this->password);
   
    $rows = $db->query(" SELECT name, password FROM users WHERE name = '$this->name' and password =('$password')");
    
    if(isset($rows)){
        foreach($rows as $item){
            $name = $item['name'];
            $password1 = $item['password'];
        }
        
        if(isset($name) && isset($password1)){
            //LOGIN ACTION or session shit :D
            header("Location: private.php");
        }

        else{
             echo "<p class='login-error'>Username or password incorrect!</p>";
        }
    }
   }
}



