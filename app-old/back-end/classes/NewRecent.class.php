<?php
/**
 * Qu'est-ce qu'on veut faire dans new recent ?
 *
 * On veut creer un objet a chaque fois qu'on ajoutera soit un album soit un artiste
 * on inserera en base
 */


use JetBrains\PhpStorm\ArrayShape;

include_once('../functions/autoIncludeClasses.inc.php');

class NewRecent extends Dbh
{
    private $connection;

    public function __construct()
    {
        $this->connection = $this->connect();
    }

    /**
     * méthode qui ajoute un artiste en base de donnée si l'artiste n'existe pas
     * si il n'existe pas on le crée et on renvoie son id
     * si il existe on renvoie l'id de l'artiste
     * ou false s'il y a deja un artiste qui existe en bdd
     * @param $artist_name
     * @return string
     */
    public function insertInArtist($artist_name): string
    {
        $sql = "SELECT id_artist
                    FROM artist 
                    WHERE artist_name = :artist_name";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':artist_name', $artist_name);
        $stmt->execute();
        $row = $stmt->fetch();

        //si l'artiste existe déjà on renvoie son id
        //si il n'existe pas on l'insert dans artiste et on renvoie le lastinsertid pour l'utiliser dans associate artiste album
        if (!$row) {
            //requete insertion fetch last insert id avec l'user id
            $sql_insert = "INSERT INTO artist (artist_name) values (:artist_name)";
            $stmt_insert = $this->connection->prepare($sql_insert);
            $stmt_insert->bindParam(':artist_name', $artist_name);
            $stmt_insert->execute();
            return $this->connection->lastInsertId();
        }

        return $row['id_artist'];
    }

    /**
     * insere l'album en base de donnée le nom de l'album serie dans le champs
     * retourne l'id de l'album inséré
     * si l'album existe déjà on récupère l'album id pour l'utiliser dans associatealbumartiste()
     * @param $album_title
     * @return string
     */
    public function insertInAlbum($album_title): string
    {
        $sql_exist = "SELECT * from album WHERE album_title = :album_title";
        $stmt_exist = $this->connection->prepare($sql_exist);
        $stmt_exist->bindParam(':album_title', $album_title);
        $stmt_exist->execute();
        $album = $stmt_exist->fetch();

        //si l'album existe déjà on renvoie son id
        //si il n'existe pas on l'insert dans album et on renvoie le lastinsertid pour l'utiliser dans associate artiste album
        if (!$album) {
            //requete insertion fetch last insert id avec l'user id
            $sql_insert = "INSERT INTO album (album_title) values (:album_title)";
            $stmt_album = $this->connection->prepare($sql_insert);
            $stmt_album->bindParam(':album_title', $album_title);
            $stmt_album->execute();
            return $this->connection->lastInsertId();
        }
        return $album['id_album'];
    }

    /**
     * On insert dans la table d'association l'id de l'artist et l'id de l'album correspondant
     * @param string $album_title
     * @param string $artist_name
     * @return string|void
     */
    public function associateArtistAlbum(string $album_title, string $artist_name)
    {
        $id_artist = $this->insertInArtist($artist_name);
        $id_album = $this->insertInAlbum($album_title);
        //on veut regarder si l'album de l'artiste existe déjà dans la table associate artiste
        //ON JOINT LES 3 TABLES, ON RECUP LE NOM DE L'ARTISTE ET LE NOM DE L'ALBUM ET CHECK DANS ASSOCIATE

            try {
                $sql = "INSERT INTO album_artist (artist_id, album_id, user_id) VALUES (:artist_id, :album_id, :user_id)";
                $stmt = $this->connection->prepare($sql);
                $stmt->bindParam(':artist_id', $id_artist);
                $stmt->bindParam(':album_id', $id_album);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->execute();
                return $id_artist . $id_album;

            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
}


    #[ArrayShape(["artist_id" => "string", "album_id" => "string"])] public function checkAssociationAlbumArtist($artist_name, $album_title, $user_id): array
    {
        $id_artist = $this->insertInArtist($artist_name);
        $id_album = $this->insertInAlbum($album_title);
        var_dump($artist_name . 'debug');
        var_dump($id_album . 'debug');
        var_dump($id_artist . ' : id artiste');
        var_dump($album_title . 'debug');

        //on veut regarder si l'album de l'artiste existe déjà dans la table associate artiste
        //ON JOINT LES 3 TABLES, ON RECUP LE NOM DE L'ARTISTE ET LE NOM DE L'ALBUM ET CHECK DANS ASSOCIATE
        $sql_exist = "SELECT * from album_artist
                          WHERE album_id = :id_album 
                          and artist_id = :id_artist limit 1";
        $stmt_exist = $this->connection->prepare($sql_exist);
        $stmt_exist->bindParam(':id_artist', $id_artist);
        $stmt_exist->bindParam(':id_album', $id_album);
        $stmt_exist->execute();
        $row = $stmt_exist->fetch();

        if (!$row) {
            $sql_insert = "INSERT INTO album_artist (artist_id, album_id, user_id) values (:artist_id, :album_id, :user_id)";
            $stmt_insert = $this->connection->prepare($sql_insert);
            $stmt_insert->bindParam(':artist_id', $id_artist);
            $stmt_insert->bindParam(':album_id', $id_album);
            $stmt_insert->bindParam(':user_id', $user_id);
            $stmt_insert->execute();
            echo'okok';
            return [
                "artist_id" => $id_artist,
                "album_id" => $id_album
            ];
        }

        return $row;
    }
}

