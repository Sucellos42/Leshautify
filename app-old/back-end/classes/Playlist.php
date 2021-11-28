<?php
include_once('../functions/autoIncludeClasses.inc.php');


/**
 *
 */
class Playlist extends Dbh
{
    private $connection;

    public function __construct()
    {
        $this->connection = $this->connect();
    }


    public function getPlaylist($user_id)
    {
        $sql = "SELECT id_playlist from playlist where user_id = :user_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    function insertPlaylist($user_id, $playlist_name)
    {
        $sql = "INSERT into playlist (list_name, user_id) values (:user_id, :playlist_name)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':playlist_name', $playlist_name);
        $stmt->execute();


    }

}