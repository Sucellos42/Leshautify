<?php
session_start();
include_once('../functions/autoIncludeClasses.inc.php');
include_once('../functions/functions.php');

//if isset()


//on récuprère les input du formulaire
// on doit sanitize les input $_POST
$email =  sanitize_email($_POST['email']);
$first_name =  sanitizeInput($_POST['first_name']);
$last_name =  sanitizeInput($_POST['last_name']);
$password =  strip_tags($_POST['password']);
$confirm_password =  strip_tags($_POST['confirm-password']);


//création nouvel objet UserRegister
$user = new UserRegister();
//insertion en base
$result = $user->insertToDB($first_name, $last_name, $email, $password);
if ($result) {
    header('Location: ../../public/pages/loginForm.php');
} else {
    $_SESSION['messages'] = "L'email existe déjà";
    header('Location: ../../public/pages/registerForm.php');
}
