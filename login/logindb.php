<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LoginUser {

    private $conn;
    private $table = "users";
    public $id;
    public $name;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function loginUserWithCredintials($email, $password) {

        $sql = "SELECT email,role FROM $this->table WHERE email='$email'";

        $resultEmail = $this->conn->query($sql);
        
        if ($resultEmail->num_rows > 0) {


            $row = $resultEmail->fetch_assoc();
            $sqlPasword = "SELECT password,role FROM $this->table WHERE email='$email'";

            $resultPassword = $this->conn->query($sqlPasword);
            if ($resultPassword->num_rows > 0) {
                $rowPassword = $resultPassword->fetch_assoc();
                $dbPassword = $rowPassword["password"];
                $role = $rowPassword["role"];


                if (strcmp($dbPassword, $password) == 0) {
                    echo json_encode(array('message' => 'User login successfully ', 'status' => '1',
                        'role'=>$role));
                } else {
                    echo json_encode(array('message' => 'Invalid password ', 'status' => '2'));
                }
            } else {
                echo json_encode(array('message' => "No password", 'status' => '2'));
            }
        } else {
            echo json_encode(array('message' => "No Email Exists with this record", 'status' => '2'));
        }

    }

}
