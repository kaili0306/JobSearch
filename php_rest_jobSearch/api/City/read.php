<?php

    header('Access-Control-Allow-Original: *');
    header('Content-Type:application/json');

    include_once '../../config/Database.php';
    include_once '../../model/City.php';

    //instantiate and connect to database
    $database = new Database();
    $db=$database->connect();

    //instantiate post 
    $city= new City($db);

    //execute read funtion from post model
    $result=$city->read();

    //get number of rows
    $num=$result->rowCount();

    //check if any post
    if($num >0){
        //initialize post array
        $city_arr=array();
        $cities_arr['data']=array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $city_item=array(
                'id'=>$id,
                'name'=>$name,
            );
            array_push($cities_arr['data'],$city_item);
        }
        echo json_encode($cities_arr);
    }else{
        echo json_encode(array('message'=>'No city found'));
    }

