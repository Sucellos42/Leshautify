<?php
require('../functions/autoIncludeClasses.inc.php');
include '../classes/Playlist.php';

$playlist = new Playlist();
$result = $playlist->getPlaylist([$_SESSION['id']]);
var_dump($result);
