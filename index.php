<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
header("Location: login/login.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require './conn.php';
        require './queries.php';


        $objDatabase = new Database();
        $conn = $objDatabase->getDbConnection();

        $objQueries = new FetchQueries($conn);
        $objQueries->readDataFromDb();

        $url = 'http://localhost/Marshal/restapi.php';
//        here
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);

        
        $response = json_decode(curl_exec($ch), true); //because of true, it's in an array
//        echo "result ".$response;
//       
        foreach ($response['data_view'] as $item) {
            $data = $item['name'];
            echo '<p style="color:red;"><b>' . $data . '</b></p>';
        }
//        to here
//        echo $response['data_view'][1]['name'];

        
        
        //here 1
//        $url = 'http://localhost/API/signupapi.php';
//
////        $name= mysql_real_escape_string($_POST['name']);
////        $email= mysql_real_escape_string($_POST['email']);
////        $password= mysql_real_escape_string($_POST['password']);
//        
////        echo $_POST['name'];
//
//        $data = array('name' => 'khush-1-3', 'email' => 'khush_1-3@yopmail.com', 'password' => 'qwerty_1-3');
//        $str = http_build_query($data);
////        print_r($data);
//
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, 'http://localhost/API/signupapi.php');
//
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $str);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
////        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_exec($ch);
//        $output=curl_exec($ch);
        //here 1

        
        curl_close($ch);
        ?>
    </body>
</html>
