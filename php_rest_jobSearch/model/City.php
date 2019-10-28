<?php
    class City{
        private $conn;

        private $table_name = "city";

        public $id;
        public $name;

        //constructor declaration
        public function __construct($db){
            $this->conn=$db;
        }

        //retrieve all data
        public function read(){
            //create query
             $query = " SELECT * FROM city";

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
        }

        public function read_single(){

            $query = " SELECT * FROM city WHERE name=?";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(1, $this->name);

            $stmt->execute();

            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            //set properties
            $this->id=$row['id'];
            $this->name=$row['name'];
        }
    }