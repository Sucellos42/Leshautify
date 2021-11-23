<?php
include_once('../functions/autoIncludeClasses.inc.php');
include_once('../classes/NewRecent.class.php');
//On récupère les infos du formulaires
$data = trim(file_get_contents('php://input'));
$decoded = json_decode($data, true);

//NE RIEN AFFICHER OU RETURN ENTRE JSON ENCODE ET DECODE SINON BUG JSON PARSE

$artist = $decoded['artist'];
$album = $decoded['album'];
$btn_name = $decoded['btn_name'];

/*if ($btn_name === 'album') {

}*/

if ($btn_name === 'artist') {
    $newArtist = new NewRecent();
//    $newArtist->newArtist($artist);
}

//si le name du bouton est album on insert dans album
/*function insertRecentArtist ($artist_name) {
    $sql = 'INSERT INTO artist(artist_name) VALUES (:artist_name)';
    $artist_name = htmlentities($artist_name);
    $stmt = $pdo->prepare($sql);

}*/
//newrecent va créer insérer un nouvel artiste ou un nouvel
//en fonction de name button = artist ou name = album

//echo json_encode($decoded);


//On les insère en base de données


