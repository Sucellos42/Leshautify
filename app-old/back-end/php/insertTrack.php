<?php
session_start();
require '../functions/autoIncludeClasses.inc.php';

$data = trim(file_get_contents('php://input'));
try {
    $decoded = json_decode($data, true, 512, JSON_THROW_ON_ERROR);

} catch (JsonException $e) {
    die($e->getMessage());
}
//on affecte a chaque variable la valeur du fetch qui correspond
$user_id = $_SESSION['id'];
$track_name = $decoded['track'];
$album_title = $decoded['album'];
$artist_name = $decoded['artist'];
$track_length = $decoded['length'];
$playlist_title = $decoded['playlist_title'];


var_dump($decoded);
//on check si l'association artist album existe déjà
$checkAssociation = new NewRecent();
$resultAlbumArtist = $checkAssociation->checkAssociationAlbumArtist($artist_name, $album_title, $user_id);
echo"<br>  association album artist de la track : ";
var_dump($resultAlbumArtist);
//on récupère les id artist et album
$album_id = $resultAlbumArtist['album_id'];
$artist_id = $resultAlbumArtist['artist_id'];

//on récupère l'id de la playlist pour l'insertion


echo"<br>  association album artist de la track : ";
var_dump();







