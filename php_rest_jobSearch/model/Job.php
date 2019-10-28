<?php
    class Job{
        private $conn;

        private $table_name = "job";

        public $id;
        public $title;
        public $link;
        public $companyName;
        public $city_id;

        //constructor declaration
        public function __construct($db){
            $this->conn=$db;
        }

        //retrieve all data
        public function read(){
            //create query
             $query = " SELECT * FROM job";

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }
        
        //retrieve single
        public function read_city(){

            $query = " SELECT * FROM Job WHERE city_id=?";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(1, $this->city_id);

            $stmt->execute();

            return $stmt;
        }
    }
                