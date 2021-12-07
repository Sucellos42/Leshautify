<?php

/**
 * On va créer une classe qui créera a chaque fois qu'on fait nouvelle playlist
 * Récupère l'id de l'user $_session id, récupère le nom de la playlist et crée la playlist
 * Fonctions à faire :
 *  function qui gère les inputs
 * function
 */
class AssignAlbumArtist extends Dbh {

    private $connection;

    public function __construct() {
        $this->connection = $this->connect();
    }

    public function addToDB ($artist_id, $album_id){

    }

    private function addToArtistTable() {
        
    }
}