<?php
require_once('../../back-end/functions/autoIncludeClasses.inc.php');
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR .'UserLogin.class.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'Dbh.class.php';

//vérification des informations de login

$email = (string)$_POST['email'];
$password = (string)$_POST['password'];
//$password = password_hash($password, PASSWORD_DEFAULT);
$erreur = (string) null;
if (!empty($email) && !empty($password)) {
    //si les champs ne sont pas vide on instancie UserLogin
    $user = new UserLogin();
    //on récupère un tableau avec les infos rentrée si l'email et le mot de passe correspondent
    $checklogin = $user->userCheckAuth($email, $password);
    //si on ne trouve pas d'email ou que le mdp n'est pas bon on a false
    if (!$checklogin){
        session_start();
        //dans ce cas on afficher une erreur
        $erreur = "Identifiants incorrects";
    } else {
        //sinon on démarre la session
        session_start();
        $_SESSION['id'] = $checklogin['id'];
        header('Location: ../../index.php');
    }


}
var_dump($_SESSION);



require 'auth.php';
if (isConnect()) {
    header('Location: /index.php');
}