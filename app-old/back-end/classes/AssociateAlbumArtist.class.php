<?php

class AssignAlbumArtist extends Dbh {

    private $connection;

    public function __construct() {
        $this->connection = $this->connect();
    }

    public function addToDB ($artist_id, $album_id){

    }

    private function addToArtistTable() {
        INSERT
    }
}