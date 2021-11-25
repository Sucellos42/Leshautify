<?php
include_once('../functions/autoIncludeClasses.inc.php');
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
    if(!$artist){
        $json = [
            'status' => 'notok',
            'erreur' => 'Veuillez rentrer un artiste'
        ];
        echo json_encode($json);
        exit();
    }elseif
    //    si le methode insertinartist renvoie false on envoie a json pour créer un alert danger en js "artist exist"
    (!$newArtist->insertInArtist($artist)){
        $json = [
            'status' => 'ok',
            'content' => 'false'
        ];
        echo json_encode($json);
    } else {
        $json = [
            'status' => 'ok',
            'content' => 'true'
        ];
        echo json_encode($json);
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
        echo json_encode($json);
        exit();
    //on regarde si le l'album éxiste deja dans la table associate
    }elseif ($newAlbum->associateArtistAlbum($album, $artist)){
        //si il existe déjà on renoie un objet json avec false
        $json = [
            'status' => 'ok',
            'content' => 'true'
        ];
        echo json_encode($json);
    } else {
        //si l'insert se fait
        $json = [
            'status' => 'ok',
            'content' => 'false'
        ];
        echo json_encode($json);
    }
}







