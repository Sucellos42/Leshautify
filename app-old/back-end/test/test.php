<?php
$string = "leoleo";
$hashed = password_hash($string, PASSWORD_DEFAULT);

var_dump(password_verify($string, $hashed));