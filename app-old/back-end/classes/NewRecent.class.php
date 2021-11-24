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

    /**
     * insere l'album en base de donnée le nom de l'album serie dans le champs
     * retourne l'id de l'album inséré
     * @param $album_title
     * @return string
     */


    public function insertInAlbum ($album_title): string
    {
        $sql = "INSERT INTO album (album_title) values (:album_title)";
        $artist_id =
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':album_title', $album_title);
        $stmt->execute();
        //récupère l'id du dernier album ajoutée
        return $this->connection->lastInsertId();
    }


    //on récupère

    /**
     * fonction sera utilisé pour associer l'id de l'artiste à l'id de l'album dans associateArtistAlbum()
     * on récupèrera l'artiste id quand on le select dans la liste déroulante
     *
     * @param $artist_name
     * @return string $id_artist
     */
    public function selectIdArtist (string $artist_name)
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
        $id_album = $this->insertInAlbum($album_title);
        $id_artist = $this->insertInArtist($artist_name);
        $sql = "INSERT INTO album_artist (artist_id, album_id) VALUES (:artist_id, :album_id)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':artist_id', $id_artist);
        $stmt->bindParam(':album_id', $id_album);

        $stmt->execute();
        return $stmt->fetch();
        return $id_album . 'artist' . $id_artist . 'album';
    }



/*    public function newRecentAlbum($album_title, $artist_name) {

    }*/
}
