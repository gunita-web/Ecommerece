<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require './conn.php';
        require './queries.php';
        // put your code here
//        echo 'Hello world';

        $objDatabase = new Database();
        $conn = $objDatabase->getDbConnection();

        $objQueries = new FetchQueries($conn);
        $objQueries->readDataFromDb();

//        $url = 'http://localhost/API/restapi.php';
//        here
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_URL, $url);
//
//        //this code prints the hole object
////        echo curl_exec($ch);
////        echo 'PHP version: ' . phpversion();
//
//        $response = json_decode(curl_exec($ch), true); //because of true, it's in an array
////       
//        foreach ($response['data_view'] as $item) {
//            $data = $item['name'];
//            echo '<p style="color:red;"><b>' . $data . '</b></p>';
//        }
//        to here
//        echo $response['data_view'][1]['name'];

        $url = 'http://localhost/API/signupapi.php';

//        $name= mysql_real_escape_string($_POST['name']);
//        $email= mysql_real_escape_string($_POST['email']);
//        $password= mysql_real_escape_string($_POST['password']);
        
//        echo $_POST['name'];

        $data = array('name' => 'khush-1-3', 'email' => 'khush_1-3@yopmail.com', 'password' => 'qwerty_1-3');
        $str = http_build_query($data);
//        print_r($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://localhost/API/signupapi.php');

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $str);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_URL, $url);
        curl_exec($ch);
        $output=curl_exec($ch);
//        $output=curl_exec($ch);
//        echo "output ".$output;
//                ;
//
//if (curl_errno($ch)) {
//    echo 'Error: ' . curl_error($ch);
//} else {
//    echo 'no error';
//}
        
        curl_close($ch);
        ?>
    </body>
</html>
