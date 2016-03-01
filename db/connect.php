<?php
/*
 * This class contains everything related to database
 */
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
   
    /*
     * Method for querying the database
     */
    public function query($query){
        // Connect to the database
        $connection = $this -> connect();
        // Query the database
        $stmt = mysqli_prepare($connection, $query);
        $stmt->execute();
        $result = $stmt ->get_result();
        return $result;
    }
    
    /*
     * Method for selecting data from the database
     */
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
    
    //Small method for stripping html and php tags from inputs
     public function stripInput($value) {
        return strip_tags($value);
    }
}