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


    public function getPlaylist($user_id): bool|array
    {
        $sql = "SELECT id_playlist from playlist where user_id = :user_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetch();
    }


    function insertPlaylist($user_id, $playlist_name)
    {
        try {
            $sql = "INSERT into playlist (list_name, user_id) values (:user_id, :playlist_name)";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':playlist_name', $playlist_name);
            $stmt->execute();
        }
        catch ( Exception $e) {
            die ($e->getMessage());
        }

    }

}