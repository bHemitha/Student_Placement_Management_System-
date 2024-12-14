<?php
require_once('../helpers/help.php');
prevent_access_after_login();
?>


<?php require_once "../helpers/header.php" ?>
<title>Login</title>

</style>
<?php require_once "../helpers/navbar.php" ?>
    <div style="padding:10%;">
        <h1 style="text-align:center;">Student Log In</h1>
        <div style="color:red;text-align:center;">
            <?php echo $_SESSION['login_message'] ?? '' ?>
        </div>


        <form action="login_student.php" method="post">
            <div style="color:red;text-align:center;">
                <?php echo $error['username'] ?? '' ?>
            </div>
            <div class="mb-3">
                <input autocomplete="off" autofocus class="form-control mx-auto w-auto" id="username" name="username" placeholder="Username" type="text" value="<?php echo $input['username'] ?? $_SESSION['registered_email'] ?? '' ?>">
            </div>
            <div style="color:red;text-align:center;">
                <?php echo $error['password'] ?? '' ?>
            </div>
            <div class="mb-3">
                <input class="form-control mx-auto w-auto" id="password" name="password" placeholder="Password" type="password">
            </div>
            <div class="mb-3">
                <input class="form-control mx-auto w-auto" type="submit" value="Log In">
            </div>
            <div>
                <p style="text-align:center;">Don't have an account?<a href="register_student.php">Create a new account.</a></p>
            </div>
        </form>
    </div>
<?php require_once "../helpers/footer.php"; ?>
<?php unset($_SESSION['login_message']) ?>
<?php unset($_SESSION['registered_email']) ?>