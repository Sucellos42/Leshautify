<?php include 'headerForm.php'?>

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="login-form bg-light mt-4 p-4">
                <form action="../../back-end/php/userRegister.php" method="post" class="row g-3">
                    <h4>Welcome Back</h4>
                    <div class="col-12">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="col-12">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="col-12">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="col-12">
                        <label>E-Mail</label>
                        <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                    </div>
                    <div class="col-12">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="col-12">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm-password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="col-12">
                        <button name="registerButton" type="submit" class="btn btn-dark float-end">Register</button>
                    </div>
                </form>
                <hr class="mt-4">
            </div>
        </div>
    </div>
</div>
