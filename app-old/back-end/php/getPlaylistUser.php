<?php
session_start();
require ('../functions/autoIncludeClasses.inc.php');
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'Playlist.php';
$user_id = $_SESSION['id'];
$playlist = new Playlist();
$playlist = $playlist->getPlaylist($user_id);
try {
    echo json_encode($playlist, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    die ($e->getMessage());
}


