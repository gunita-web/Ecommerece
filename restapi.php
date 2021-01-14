<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require './conn.php';
require './queries.php';


$database = new Database();
$db = $database->getDbConnection();

$objQueries = new FetchQueries($db);

$result = $objQueries->readDataFromDb();

$cat_arr = array();
$cat_arr['data_view'] = array();


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //                echo '<p></p>'.$row["name"];

        
        extract($row);
        $cat_item = array(
            'id' => $id, //==$row["id"]
            'name' => $name
        );
        // Push to "data"
        array_push($cat_arr['data_view'], $cat_item);
    }

    echo json_encode($cat_arr);
} else {
    echo json_encode(
            array('message' => 'No Data Found')
    );
}
