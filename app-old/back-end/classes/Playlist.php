<?php



/**
 *
 */
class Playlist extends Dbh
{
    private $connection;
    public $playlist;

    public function __construct()
    {
        $this->connection = $this->connect();
    }


    public function getPlaylist($user_id): void
    {
        $sql = "SELECT * from playlist where user_id = :user_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $this->playlist = $stmt->fetchAll();
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