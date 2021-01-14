<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class FetchQueries{
    private $conn;
    private $table="resturl";
    
    public $id;
    public $name;
    
    public function __construct($db) {
        $this->conn=$db;
    }
    
    //Read data from database
    public function readDataFromDb(){
        $sql = "SELECT id,name FROM .$this->table";
        $result = $this->conn->query($sql);
        
//        if ($result->num_rows > 0) {
////        
//            while ($row = $result->fetch_assoc()) {
//                echo '<p></p>'.$row["name"];
//            }
//        }
        
        return $result;
    }
}

