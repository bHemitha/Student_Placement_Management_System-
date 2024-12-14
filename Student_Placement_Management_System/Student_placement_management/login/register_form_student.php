<?php
require_once('../helpers/help.php');
prevent_access_after_login();
?>

<?php require_once "../helpers/header.php" ?>

<title>Register</title>

<?php require_once "../helpers/navbar.php" ?>

    <div style="padding:10%;">
        <h1>Register As Student</h1>
        <form action="register_student.php" method="post">
            <div style="color:red;text-align:center;">
                <?php echo $error['username'] ?? '' ?>
            </div>
            <div class="mb-3">
                <input autocomplete="off" autofocus class="form-control mx-auto w-auto" id="username" name="username" placeholder="Username" type="text" value="<?php echo $input['username'] ?? '' ?>">
            </div>
            <div style="color:red;text-align:center;">
                <?php echo $error['email'] ?? '' ?>
            </div>
            <div class="mb-3">
                <input autocomplete="off" autofocus class="form-control mx-auto w-auto" id="email" name="email" placeholder="Email address" type="text" value="<?php echo $input['email'] ?? '' ?>">
            </div>
            <div style="color:red;text-align:center;">
                <?php echo $error['password'] ?? '' ?>
            </div>
            <div class="mb-3">
                <input class="form-control mx-auto w-auto" id="password" name="password" placeholder="Password" type="password" value="<?php echo $input['password'] ?? '' ?>">
            </div>
            <div style="color:red;text-align:center;">
                <?php echo $error['confirmation'] ?? '' ?>
            </div>
            <div class="mb-3">
                <input class="form-control mx-auto w-auto" id="confirmation" name="confirmation" placeholder="Confirm Password" type="password" value="<?php echo $input['confirmation'] ?? '' ?>">
            </div>
            <div style="text-align:center;margin-bottom:10px;">
                <img style="display: inline;width:170px" src="captcha.php" id="captcha_img">
                <input type="button" value="refresh" onclick="refresh()">
            </div>


            <div style="color:red;text-align:center;">
                <?php echo $error['captcha'] ?? '' ?>
            </div>
            <div class="mb-3">
                <input class="form-control mx-auto w-auto" id="captcha" name="captcha" placeholder="Captcha Code" type="text" value="<?php echo $input['captcha'] ?? '' ?>">
            </div>
            <div style="text-align:center;">
                <button class="btn" type="submit" style="background-color:gray;color: white;">Register</button>
            </div>

            <div style="text-align:center;">
                <p style="text-align:center;color:white">Already have an account?<a href="login.php">Log in</a></p>
            </div>
        </form>
    </div>
<script>
    function refresh() {
        var img = document.getElementById("captcha_img");
        img.src = "captcha.php";
    }
</script>

<?php require_once "../helpers/footer.php"; ?>