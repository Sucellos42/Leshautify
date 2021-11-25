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

    /**
     * méthode qui ajoute un artiste en base de donnée si l'artiste n'existe pas
     * si il n'existe pas on le crée et on renvoie son id
     * si il existe on renvoie l'id de l'artiste
     * ou false s'il y a deja un artiste qui existe en bdd
     * @param $artist_name
     * @return string|bool
     *
     */
    public function insertInArtist($artist_name): string
    {
        $sql_exist = "SELECT * from artist WHERE artist_name = :artist_name";
        $stmt_exist = $this->connection->prepare($sql_exist);
        $stmt_exist->bindParam(':artist_name', $artist_name);
        $stmt_exist->execute();
        $artist = $stmt_exist->fetch();

        if(!$artist) {
            $sql = "INSERT INTO artist (artist_name) values (:artist_name)";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':artist_name', $artist_name);
            $stmt->execute();
            return $this->connection->lastInsertId();

        } else return false ;

        //je récupère mon dernier id
//        return $this->connection->lastInsertId();
    }

    /**
     * insere l'album en base de donnée le nom de l'album serie dans le champs
     * retourne l'id de l'album inséré
     * @param $album_title
     * @return string
     */


    public function insertInAlbum ($album_title): string
    {
        $sql = "INSERT INTO album (album_title) values (:album_title)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':album_title', $album_title);
        $stmt->execute();
        //récupère l'id du dernier album ajoutée
        return $this->connection->lastInsertId();
    }


    /**
     * fonction sera utilisé pour associer l'id de l'artiste à l'id de l'album dans associateArtistAlbum()
     * on récupèrera l'artiste id quand on le select dans la liste déroulante
     * (on aurait pu utiliser insert album mais j'arrive pas a renvoyer false pour générer une erreur qui sera fetch en js
     * si l'artiste existe deja et qu'on renvoie son id
     *
     * @param $artist_name
     * @return string $id_artist
     */
    public function selectIdArtist (string $artist_name): string
    {
        $sql = "SELECT id_artist from artist where artist_name = :artist_name";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':artist_name', $artist_name);
        $stmt->execute();
        return $stmt->fetch();
    }



    /**
     * On insert dans la table d'association l'id de l'artist et l'id de l'album correspondant
     * @param $id_artist
     * @param $id_album
     */
    public function associateArtistAlbum(string $album_title, string $artist_name) {
        $id_album = $this->selectIdArtist($album_title);
        $id_artist = $this->selectIdArtist($artist_name);

        $sql = "INSERT INTO album_artist (artist_id, album_id) VALUES (:artist_id, :album_id)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':artist_id', $id_artist);
        $stmt->bindParam(':album_id', $id_album);
        $stmt->execute();
        return $stmt->fetch();
    }


}

