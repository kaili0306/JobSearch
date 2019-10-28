<?php

    header('Access-Control-Allow-Original: *');
    header('Content-Type:application/json');

    include_once '../../config/Database.php';
    include_once '../../model/Job.php';

    //instantiate and connect to database
    $database = new Database();
    $db=$database->connect();

    //instantiate post 
    $job= new Job($db);

    //execute read funtion from post model
    $result=$job->read();

    //get number of rows
    $num=$result->rowCount();

    //check if any post
    if($num >0){
        //initialize post array
        $job_arr=array();
        $jobs_arr['data']=array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $job_item=array(
                'id'=>$id,
                'title'=>$title,
                'link'=>$link,
                'companyName'=>$companyName,
                'city_id'=>$city_id,
            );
            array_push($jobs_arr['data'],$job_item);
        }
        echo json_encode($jobs_arr);
    }else{
        echo json_encode(array('message'=>'No job found'));
    }

