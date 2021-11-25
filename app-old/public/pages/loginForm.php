<?php
require_once('../../back-end/functions/autoIncludeClasses.inc.php');
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
    //si on ne trouve pas d'email ou que le mdp n'est pas on a false
    if (!$checklogin){
        session_start();
        //dans ce cas on afficher une erreur
        $erreur = "Identifiants incorrects";
        var_dump($_SESSION);
    } else {
        //sinon on démarre la session
        session_start();
        $_SESSION['id'] = $checklogin['id'];
        header('Location: ../../index.php');
    }


}
//on veut ici que quand l'user va sur loginForm.php il soit directement redirigé vers le dashboard
//on verifie donc si il est connecté
//require '../../back-end/php/auth.php';
//userConnected();

require('headerForm.php');
?>
<div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="login-form bg-light mt-4 p-4">
                        <?php if($erreur): ?>
                        <div class="alert alert-danger">
                            <?= $erreur ?>
                        </div>
                        <?php endif ?>
                        <form action="" method="POST" class="row g-3">
                            <h4>Welcome Back</h4>
                            <div class="col-12">
                                <label>E-Mail or Username</label>
                                <input type="text" name="email" class="form-control" placeholder="Username" >
                            </div>
                            <div class="col-12">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" >
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe"> Remember me</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button name="loginButton" type="submit" class="btn btn-dark float-end">Login</button>
                            </div>
                        </form>
                        <hr class="mt-4">
                        <div class="col-12">
                            <p class="text-center mb-0">Have not account yet? <a href="">Signup</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include_once 'footer.php'; ?>