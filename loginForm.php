<?php
include("./Header/header.php");
?>

<section class="login">
    <div class="login-form">
        <form action="./Backend/login.php" method="POST">
            <h4 class="modal-title">
                Login To Your Account
            </h4>

            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required >
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>

            <input type="submit" class="btn btn-outline-info btn-block btn-lg text-white justify-content-center" value="Login">
            <br>
            <div class="text-center small m-3">Don't have an account?
                <a href="registerForm.php">Sign up</a>
            </div>
        </form>
    </div>
</section>

<?php
include("./Footer/footer.php")
?>