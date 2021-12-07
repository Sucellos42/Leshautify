<?php
session_start();
include_once('../functions/autoIncludeClasses.inc.php');
//On récupère les infos du formulaires
$data = trim(file_get_contents('php://input'));
try {
    $decoded = json_decode($data, true, 512, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    die($e->getMessage());
}

//NE RIEN AFFICHER OU RETURN ENTRE JSON ENCODE ET DECODE SINON BUG JSON PARSE

$artist = $decoded['artist'];
$album = $decoded['album'];
$btn_name = $decoded['btn_name'];
$user_id = $_SESSION['id'];

/*if ($btn_name === 'album') {

}*/

if ($btn_name === 'artist') {
    $newArtist = new NewRecent();
    if(!$artist){
        //erreur champs artiste vide
        $json = [
            'status' => 'notok',
            'erreur' => 'Rentrer un artiste'
        ];
        try {
            echo json_encode($json, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            die($e->getMessage());
        }
        exit();
    } elseif
    //l'artiste existe dejà
    (!$newArtist->associateArtistAlbum($album, $artist, $user_id)){
        $json = [
            'status' => 'ok',
            'content' => 'false'
        ];
        try {
            echo json_encode($json, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            die($e->getMessage());
        }
    } else {
        $json = [
            'status' => 'ok',
            'content' => 'true'
        ];
        try {
            echo json_encode($json, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            die($e->getMessage());
        }
    }
//    $newArtist->newArtist($artist);
}

elseif ($btn_name === 'album') {
    $newAlbum = new NewRecent();
    //on regarde si le champs nouvel album est vide
    if(!$album) {
        $json = [
            'status' => 'notok',
            'erreur' => 'Veuillez rentrer un artiste'
        ];
        try {
            echo json_encode($json, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            die($e->getMessage());
        }
        exit();
    //on regarde si le l'album éxiste deja dans la table associate
    }elseif ($newAlbum->associateArtistAlbum($album, $artist, $user_id)){
        //si il existe déjà on renoie un objet json avec false
        $json = [
            'status' => 'ok',
            'content' => 'true'
        ];
        try {
            echo json_encode($json, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            die($e->getMessage());
        }
    } else {
        //si l'insert se fait
        $json = [
            'status' => 'ok',
            'content' => 'false'
        ];
        try {
            echo json_encode($json, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            die($e->getMessage());
        }
    }
}




//Si l'artiste existe déjà




