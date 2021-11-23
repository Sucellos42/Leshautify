<?php
include_once('Dbh.class.php');
include_once('../functions/functions.php');

// On veut récupérer manuellement les derniers albums et derniers artistes ajoutés
// Pour ça on veut faire une requếte qui regardera les 8 derniers album et 8 dernier artistes ajoutée
/*
 * va s'éxecuter lorsqu'on se connecte et à chaque fois qu'on arrive sur la page d'accueil
 * */


// la requête pour trouver les 4 premiers ---->
//SELECT album_title from album limit 4  order by id_album desc
//SELECT artist_name from artist limit 4  order by id_artist desc
/**/

//Suite j'affiche mon plus quoi qu'il arrive


class Recent extends Dbh {
    private $connection;
    public $recentAlbum;
    public $recentArtist;


    public function __construct() {
        $this->connection = $this->connect();
    }

    public function checkRecent() {
        try {
            //je définis mes requêtes sql
            $sqlRecentArtist = "SELECT artist_name from artist order by id_artist desc ";
            $sqlRecentAlbum = "SELECT album_title from album order by id_album desc ";

            //prepare et éxecute les réquêtes sql pour trouver les 6 premiers artistes
            $resultArtist = $this->connection->prepare($sqlRecentArtist);
            $resultArtist->execute();
            $this->recentArtist = $resultArtist->fetchAll();

            $recentAlbum = $this->connection->prepare($sqlRecentAlbum);
            $recentAlbum->execute();
            $this->recentAlbum = $recentAlbum->fetchAll();


        } catch ( Exception $e) {
            die ($e->getMessage());
        }
    }

    public function getNewRecent () {

    }



}














