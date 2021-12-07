<?php
session_start();
require ($_SERVER['DOCUMENT_ROOT'] . '/back-end/functions/autoIncludeClasses.inc.php');
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'Playlist.php';
$user_id = $_SESSION['id'];
//on instancie l'objet playlist
$playlist = new Playlist();
//on récupère un tableau assocaciatif avec chaque ligne qui correspond a chaque playlist
$playlist->getPlaylist($user_id);
try {
    echo json_encode($playlist, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    die($e->getMessage());
}


