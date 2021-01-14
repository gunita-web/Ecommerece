<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserCart {

    private $conn;
    private $table = "users";

    public function __construct($db) {
        $this->conn=$db;
    }
    
    
     public function getUserAddedCart($email) {

        $sql = "Select  cart From $this->table  WHERE email='$email'";
//        echo '<br> ' . $sql;
        $result = $this->conn->query($sql);

        
        if ($result->num_rows > 0) {
//        
             $arrayData=null;
            while ($row = $result->fetch_assoc()) {


//                echo '<p></p>' . $row["cart"] . gettype($row["cart"]);//returns the object and object type
//                echo "<br>" . gettype($row["cart"]);//return objectytpe as string
//                echo "<br>" . gettype(json_decode($row["cart"]));//return json object
//
                $data = json_decode($row["cart"]);
//                echo "<br> okokokok" . $data[0]->code;
//                foreach ($data as $value) {
//                    echo "<br>" . $value->name;
//                }
                $arrayData=$data;
//                echo '<br> return type '. gettype($arrayData);
            }


            return $arrayData;
        } else {
            echo 'NO RREEEE';
        }
    }
}
