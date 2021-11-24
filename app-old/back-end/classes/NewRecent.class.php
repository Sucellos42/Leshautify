<?php
/**
 * Qu'est-ce qu'on veut faire dans new recent ?
 *
 * On veut creer un objet a chaque fois qu'on ajoutera soit un album soit un artiste
 * on inserera en base
 */




include_once('../functions/autoIncludeClasses.inc.php');

class NewRecent extends Dbh {
    private $connection;

    public function __construct () {
       $this->connection = $this->connect();
    }

/*    public function newArtistAlbum ($id) {
        $artist_id = $this->insertInArtist();
        $album_id = $this->insertInAlbum($id);


    }*/

    /**
     * méthode qui ajoute un artiste en base de donnée
     * renvoie l'id de l'artiste
     * @param $artist_name
     * @return string
     */
    public function insertInArtist($artist_name)
    {
        $sql = "INSERT INTO artist (artist_name) values (:artist_name)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':artist_name', $artist_name);
        $stmt->execute();
        //je récupère mon dernier id
//        return $this->connection->lastInsertId();
    }

    private function insertInAlbum ($album_title, $artist_name): string
    {
        $sql = "INSERT INTO album (album_title) values (:album_title)";
        $artist_id =
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':album_title', $album_title);
        $stmt->execute();
        //récupère l'id du dernier album ajoutée
        return $this->connection->lastInsertId();
    }



/*    public function newRecentAlbum($album_title, $artist_name) {

    }*/
}
