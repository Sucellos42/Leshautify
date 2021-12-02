<?php
session_start();
/*require '../functions/autoIncludeClasses.inc.php';

require ($_SERVER['DOCUMENT_ROOT'] . '/back-end/functions/autoIncludeClasses.php');
require ($_SERVER['DOCUMENT_ROOT'] . "/back-end/functions/functions.php");*/



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


/*$track = new Track();
$track-> insertTrack($user_id, $track_name, $album_title, $artist_name, $track_length);*/


