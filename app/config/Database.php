<?php
require __DIR__ . './databaseAccess.php';

class Database {
    private $connection;

    public function __construct() {
        try{
            $this->connection = new mysqli(DB_HOST, DB_USER ,DB_PASS ,DB_NAME);
        }catch(Exception $e){
            die('Unable to connect to Database');
        }
    }
    
    public function getConnection() : object{
        return  $this->connection;
    }
    
    function __destruct(){
        mysqli_close($this->connection);
    }
}