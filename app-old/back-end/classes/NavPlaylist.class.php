<?php
include_once('../functions/autoIncludeClasses.inc.php');


/**
 *
 */
class NavPlaylist extends Dbh {
    private $connection;

    public function __construct()
    {
        $this->connection = $this->connect();
    }


    public function getPlaylist ($user_id){
        $sql = "SELECT id_playlist from playlist where user_id = :user_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}