<?php
session_start();
require ($_SERVER['DOCUMENT_ROOT'] . '/back-end/php/login.php');
var_dump($_SESSION);
//on veut ici que quand l'user va sur loginForm.php il soit directement redirigé vers le dashboard
//on verifie donc si il est connecté
/*require '../../back-end/php/auth.php';
userConnected();*/

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
                            <p class="text-center mb-0">Have not account yet? <a href="registerForm.php">Signup</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include_once 'footer.php'; ?>