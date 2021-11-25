<?php
require('../functions/autoIncludeClasses.inc.php');
$playlist = new NavPlaylist();
$result = $playlist->getPlaylist();
var_dump($result);
