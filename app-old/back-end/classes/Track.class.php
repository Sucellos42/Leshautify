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
        return $stmt->fetchAll();
    }

    //on veut insérer en base de donnée la track
    //on regarde si l'association existe dans la base donnée a la table album_artist
    public function insertTrack($user_id, $track_name, $album_title, $artist_name, $track_length): void
    {

    }



}


    public function checkAssociationAlbumArtist() {

}