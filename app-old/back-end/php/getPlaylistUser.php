<?php
require '../functions/autoIncludeClasses.inc.php';
session_start();


$data = trim(file_get_contents('php://input'));
$decoded = json_decode($data, true);

$playlist_name = $decoded['playlist_name'];




$playlist = new Playlist();


