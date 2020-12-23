<?php 
class DB {
    public function connect(){
        try{
            $conn = new PDO("mysql:host=localhost;dbname=articles",'root','');
        
            // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();

        }

        
    }
}