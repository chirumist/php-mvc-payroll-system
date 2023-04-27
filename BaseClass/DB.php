<?php
namespace BaseClass;

use PDO; 
class DB {

    public $host = DB_HOST;
    public $db = DB_DATABASE;
    public $user = DB_USER;
    public $password = DB_PASSWORD;
    public $con;
    public $result;

    public function __construct()
    {
        try {
            return $this->con = new PDO('mysql:host='.$this->host.';dbname='.$this->db.';charset=utf8',$this->user,$this->password);
        }catch (PDOException $e) {
            echo "Database connection Error: ". $e->getMessage();
        }
    }

    public function query($query,$params = []){
        if (empty($params)){
            $this->result = $this->con->prepare($query);
            return $this->result->execute();
        } else {
            $this->result = $this->con->prepare($query);
            return $this->result->execute($params);
        }
    }

    public function rowCount(){
        return $this->result->rawCount();
    }

    public function fetchAll(){
        return $this->result->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetch(){
        return $this->result->fetch(PDO::FETCH_OBJ);
    }

    public function lastInsertId(){
        return $this->con->lastInsertId();
    }
}