<?php
include_once('../functions/autoIncludeClasses.inc.php');



class Track extends Dbh {
    private $connection;

    public function __construct()
    {
        $this->connection = $this->connect();
    }


    public function getPlaylist (){
        $sql = "SELECT * from user";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }


}