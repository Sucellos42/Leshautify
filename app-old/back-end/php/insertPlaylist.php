<?php
session_start();
require '../functions/autoIncludeClasses.inc.php';
require ($_SERVER['DOCUMENT_ROOT'] . "/back-end/functions/functions.php");
require '../classes/Playlist.php';


//1. On récupère les infos grace a fetch
//2. On
//On récupère les infos du formulaires
$data = trim(file_get_contents('php://input'));
try {
    $decoded = json_decode($data, true, 512, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    die($e->getMessage());
}
$user_id = $_SESSION['id'];
$playlist_name = $decoded['playlist_name'];


$playlist = new Playlist();
$playlist->insertPlaylist($playlist_name, $user_id);




