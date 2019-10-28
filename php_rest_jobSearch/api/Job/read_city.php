<?php

    header('Access-Control-Allow-Original: *');
    header('Content-Type:application/json');

    include_once '../../config/Database.php';
    include_once '../../model/Job.php';

    //instantiate and connect to database
    $database = new Database();
    $db=$database->connect();

    //instantiate job 
    $job= new Job($db);

    $job->city_id = isset($_GET['city_id']) ? $_GET['city_id'] : die() ;

    //execute read funtion from job model
    $result=$job->read_city();

    //get number of rows
    $num=$result->rowCount();

    //check if any job
    if($num >0){
        //initialize job array
        $job_arr=array();
        $jobs_arr['data']=array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $job_item=array(
                'id'=>$id,
                'title'=>$title,
                'companyName'=>$companyName,
                'link'=>$link,
                'city_id'=>$city_id,

            );
            array_push($jobs_arr['data'],$job_item);
        }
        echo json_encode($jobs_arr);
    }else{
        echo json_encode(array('message'=>'No job found'));
    }

