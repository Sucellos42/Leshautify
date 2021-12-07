<?php


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
    public array|false $recentArtist;
    public array|false $recentAlbum;


    public function __construct() {
        $this->connection = $this->connect();
    }

    public function checkRecent($user_id): void
    {
        try {
            //je définis mes requêtes sql
            $sqlRecentAlbum = "SELECT album.album_title, album_artist.album_id, album.id_album, album_artist.user_id as user_id 
                                FROM album 
                                JOIN album_artist on album_artist.album_id = album.id_album 
                                WHERE user_id = :user_id
                                ORDER BY album_id DESC ";

            $sqlRecentArtist = "SELECT artist.artist_name, album_artist.artist_id, artist.id_artist, album_artist.user_id as user_id 
                                FROM artist 
                                JOIN album_artist on album_artist.artist_id = artist.id_artist
                                WHERE user_id = :user_id
                                ORDER BY artist_id DESC ";

            //prepare et éxecute les réquêtes sql pour trouver les 6 premiers artistes
            $recentArtist = $this->connection->prepare($sqlRecentArtist);
            $recentArtist->bindParam(':user_id', $user_id);
            $recentArtist->execute();
            $this->recentArtist = $recentArtist->fetchAll();

            $recentAlbum = $this->connection->prepare($sqlRecentAlbum);
            $recentAlbum->bindParam(':user_id', $user_id);
            $recentAlbum->execute();
            $this->recentAlbum = $recentAlbum->fetchAll();


        } catch ( Exception $e) {
            die ($e->getMessage());
        }
    }
}















