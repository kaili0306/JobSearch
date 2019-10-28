<?php

    header('Access-Control-Allow-Original: *');
    header('Content-Type:application/json');

    include_once '../../config/Database.php';
    include_once '../../model/City.php';

    //instantiate and connect to database
    $database = new Database();
    $db=$database->connect();

    //instantiate  
    $city= new City($db);

    //GET id 
    $city->name = isset($_GET['name']) ? $_GET['name'] : die() ;

    $city->read_single();

    if($city->name!=null){
    $city_arr = array(
        'id'=>$city->id,
        'name'=>$city->name,
    );

    http_response_code(200);

    echo json_encode($city_arr);
    }
    else{
        http_response_code(404);
        echo json_encode(array("message" => " does not exist."));
    }
