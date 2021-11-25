<?php
require('../functions/autoIncludeClasses.inc.php');
$playlist = new UserRegister();
$playlist->userCheckMail();
var_dump($playlist);
