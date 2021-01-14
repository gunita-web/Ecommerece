<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require '../conn.php';
require './logindb.php';

$database = new Database();
$db = $database->getDbConnection();

$objLogin = new LoginUser($db);


if (isset($_POST['email'], $_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


//    echo $email;
    if (empty($email)) {
        echo json_encode(array('message' => 'Please enter Email.', 'status' => '2'));
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(array('message' => 'Invalid Email address.', 'status' => '2'));
    } else if (empty($password)) {
        echo json_encode(array('message' => 'Please enter Password.', 'status' => '2'));
    } else {
        return $objLogin->loginUserWithCredintials( $email, $password);
    }

//    $objSignup->registerUserAndSaveToDb($name, $email, $password);
}

