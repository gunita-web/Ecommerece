<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Database{
private $servername = "localhost";
 private   $username = "root";
 private   $password = "";
  private  $dbName = "app";


 private   $conn;// = new mysqli($servername,$username,$password,$dbName);

 
 public function getDbConnection() {
     $this->conn=null;
     $this->conn=new mysqli($this->servername, $this->username, $this->password, $this->dbName);
     
     if($this->conn->connect_error){
         die("connection failed: " . $conn->connect_error);
     } else {
//         echo 'Connection success';
     }
     return $this->conn;
 }
 
 }
    

 
//    if ($conn->connect_error) {
//        die("connection failed: " . $conn->connect_error);
//    } else {
//       
////        echo 'Connection success';
//        
//        $val = $conn->query('select 1 from `tour_images` LIMIT 1');
//        
//        $sql = "SELECT id,name FROM resturl";
//        $result = $conn->query($sql);
//        if ($result->num_rows > 0) {
//        
//            while ($row = $result->fetch_assoc()) {
//                echo '<p></p>'.$row["name"];
//            }
//        }
//        
//        
//}
//
//
//
//
//}



