<?php
require_once('../../back-end/functions/autoIncludeClasses.inc.php');
require_once('../../back-end/functions/functions.php');
//require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR .'UserLogin.class.php';

//vérification des informations de login

$email = (string)sanitize_email($_POST['email']);
$password = strip_tags($_POST['password']);
$erreur = (string) null;

if (!empty($email) && !empty($password)) {
    //si les champs ne sont pas vide on instancie UserLogin
    $user = new UserLogin();
    //on récupère un tableau avec les infos rentrée si l'email et le mot de passe correspondent
    $checkLogin = $user->userCheckAuth($email, $password);
    var_dump($checkLogin .  'okok');
    //si on ne trouve pas d'email ou que le mdp n'est pas bon on a false
    if (!$checkLogin){
        session_start();
        //dans ce cas on afficher une erreur
        $_SESSION['login'] = "Identifiants incorrects";
    } else {
        //sinon on démarre la session
        session_start();
        $_SESSION['id'] = $checkLogin['id'];
        header('Location: ../../index.php');
    }


} else {
    $_SESSION['login'] = "Veuillez rentrer votre mail et votre mot de passe";

}
var_dump($_SESSION);



require 'auth.php';
if (isConnect()) {
    header('Location: /index.php');
}