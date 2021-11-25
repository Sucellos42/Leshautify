<?php
include_once('../functions/autoIncludeClasses.inc.php');


class NavPlaylist extends Dbh {
    private $connection;

    public function __construct()
    {
        $this->connection = $this->connect();
    }


    public function getPlaylist (){
        $sql = "SELECT id_playlist from playlist";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}