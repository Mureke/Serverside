<?php

class Db{
    
    protected static $connection;
    
    //Make a new database connection
    public function connect(){
        
      if(!isset(self::$connection)) {
            $config = parse_ini_file('conf/config.ini'); 
            self::$connection = new mysqli('localhost',$config['username'],$config['password'],$config['dbname']);
        }

        if(self::$connection === false) {
            return mysqli_connect_error();
        }
        return self::$connection;
    }
   

    public function query($query){
        // Connect to the database
        $connection = $this -> connect();

        // Query the database
        $result = $connection -> query($query);
       
        return $result;
    }
    

    public function select($query) {
        $rows = array();
        $result = $this -> query($query);
        if($result === false) {
            return false;
        }
        while ($row = $result -> fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
    
     public function quote($value) {
        $connection = $this -> connect();
        return "'" . $connection -> real_escape_string($value) . "'";
    }
}