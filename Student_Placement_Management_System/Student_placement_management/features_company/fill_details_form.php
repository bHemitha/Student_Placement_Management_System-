<?php
require_once("../helpers/config.php");
require_once("../helpers/help.php");
require_login();
if (isset($_POST['edit_profile'])){
$sql = "SELECT * FROM COMPANY where c_id= ? ";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "i", $_SESSION['user_id']);
mysqli_stmt_execute($stmt);
$result=mysqli_stmt_get_result($stmt);
$result = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $input['c_name']=$result['C_NAME'];
    $input['c_email']=$result['C_EMAIL'];
    $input['c_phone']=$result['C_PHONE'];
    $input['c_manager']=$result['C_MANAGER'];
    $input['c_desc']=$result['C_DESC'];
    $_SESSION['edit_profile']=TRUE;
}



?>


<?php require_once "../helpers/header.php"; ?>

<title>SPM : Company Details form</title>

<?php require_once "../helpers/navbar.php"; ?>
<div style="padding:10%;">
    <h1>Company Details</h1>
    <form action="fill_details.php" method="post">
        <div style="color:red;">
            <?php echo $error['c_name'] ?? '' ?>
        </div>
        <div class="mb-3">
            <input autocomplete="off" autofocus class="form-control mx-auto w-auto" id="c_name" name="c_name"
                placeholder="company name" type="text" value="<?php echo $input['c_name'] ?? '' ?>">
        </div>
        <div style="color:red;">
            <?php echo $error['c_email'] ?? '' ?>
        </div>
        <div class="mb-3">
            <input autocomplete="off" autofocus class="form-control mx-auto w-auto" id="c_email" name="c_email"
                placeholder="Email address" type="text" value="<?php echo $input['c_email'] ?? '' ?>">
        </div>
        <div style="color:red;">
            <?php echo $error['c_phone'] ?? '' ?>
        </div>
        <div class="mb-3">
            <input autocomplete="off" autofocus class="form-control mx-auto w-auto" id="c_phone" name="c_phone"
                placeholder="Phone number" type="text" value="<?php echo $input['c_phone'] ?? '' ?>">
        </div>
        <div style="color:red;">
            <?php echo $error['c_manager'] ?? '' ?>
        </div>
        <div class="mb-3">
            <input autocomplete="off" autofocus class="form-control mx-auto w-auto" id="c_manager" name="c_manager"
                placeholder="Manager name" type="text" value="<?php echo $input['c_manager'] ?? '' ?>">
        </div>
        <div style="color:red;">
            <?php echo $error['c_desc'] ?? '' ?>
        </div>
        <div class="mb-3">
            <input autocomplete="off" autofocus class="form-control mx-auto w-auto" id="c_desc" name="c_desc"
                placeholder="Company description" type="text" value="<?php echo $input['c_desc'] ?? '' ?>">
        </div>
        <div>
            <img style="display: inline;width:170px" src="captcha.php" id="captcha_img">
            <input type="button" value="refresh" onclick="refresh()">
        </div>
        <div style="color:red;">
            <?php echo $error['captcha'] ?? '' ?>
        </div>
        <div class="mb-3">
            <input class="form-control mx-auto w-auto" id="captcha" name="captcha" placeholder="Captcha Code" type="text"
                value="<?php echo $input['captcha'] ?? '' ?>">
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>
<script>
    function refresh() {
        var img = document.getElementById("captcha_img");
        img.src = "captcha.php";
    }
</script>

<?php require_once "../helpers/footer.php"; ?>