<?php
include_once('../functions/autoIncludeClasses.inc.php');


//on récuprère les input du formulaire
// on doit sanitize les input $_POST
$email = (string) $_POST['register-email'];
$first_name = (string) $_POST['first_name'];
$last_name = (string) $_POST['last_name'];
$pseudo = (string) $_POST['username'];
$password = (string) $_POST['password'];
$confirm_password = (string) $_POST['confirm-password'];

//cration nouvel objet UserRegister
$user = new UserRegister();
//insertion en base
$result = $user->insertToDB($first_name, $last_name, $email, $pseudo, $password);
if (!$result) {
    echo('<script>alert("Register successfull")</script>');
    header('Location: ../../public/pages/loginForm.php');
} else {
    return false;

}
