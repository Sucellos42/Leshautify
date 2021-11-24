<?php
require_once('../functions/autoIncludeClasses.inc.php');
//vérification des informations de login

$email = (string)$_POST['email'];
$password = (string)$_POST['password'];
//$password = password_hash($password, PASSWORD_DEFAULT);

if (!empty($email) && !empty($password)){

    $user = new UserLogin();
    $checklogin = $user->userCheckAuth($email, $password) ;
    if ($checklogin) {
        header('Location: ../../public/pages/dashboard.php');
    } else {
        header('Location: loginForm.php');
    }

}
