<?php require_once "../helpers/header.php"; ?>

<title>SPM : Company Profile</title>
<style>
    #main {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    #about {
        background-color: #000;
        color: white;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;

    }

    #about h2 {
        font-size: 24px;
        color: white;
    }

    #about p {
        font-size: 16px;
        color: white;
    }

    #h1 {
        font-size: 45px;
        color: black;
        align-items: center;
        padding: 10px;
        margin-top: 20px;
    }

    #contact {
        background-color: #000;
        color: white;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    #contact h2 {
        font-size: 24px;
        color: white;
    }

    #contact address p {
        font-size: 16px;
        color: white;
        margin: 5px 0;
    }

    img {
        margin-left: auto;
        margin-right: auto;
        border-radius: 40%;
        width: 200px;
        border: solid #333 5px;
    }
</style>
<?php  ?>

<?php
require_once "../helpers/config.php";
require_once "../helpers/help.php";

require_login();
company_details_filled();
require_once "../helpers/navbar.php";

$user_id = $_SESSION['user_id'];
$sql = "SELECT c_name, c_email,c_phone,c_manager,c_desc FROM company WHERE c_id = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $company_name = $row['c_name'];
    $company_email = $row['c_email'];
    $company_phone = $row['c_phone'];
    $company_desc = $row['c_desc'];
    $company_manager = $row['c_manager'];
} else {
    $company_name = "Company Name";
    $company_email = "company@example.com";
    $company_desc = "Company description not available.";
    $company_manager = "Manager not available.";
}
?>
<h6 style="color:green;">
        <?php echo $_SESSION['s_message'] ?? '' ?>
    </h6>
    <h6 style="color:red;">
        <?php echo $_SESSION['e_message'] ?? '' ?>
    </h6>
<header>
    <h1 id="h1">
        <?php echo $company_name; ?>
    </h1>
</header>
<main id="main">
    <section id="about">
        <div style="text-align:center;">
            <img src="profile.jpg"> </img>
        </div>
        <div style="text-align:center;width:100% ;padding :10px;">
            <h2 id="h2">About Us</h2>
            <p>
                <?php echo $company_desc; ?>
            </p>
        </div>

    </section>
    <section id="contact">
        <h2>Contact Information</h2>
        <address>
            <p>Email:
                <?php echo $company_email; ?>
            </p>
            <p>Manager:
                <?php echo $company_manager; ?>
            </p>
            <p>Phone NO:
                <?php echo $company_phone; ?>
            </p>
        </address>
    </section>
    <form id="form" action="fill_details_form.php" method="POST">
        <button name="edit_profile" class="btn btn-primary" type="submit">Edit Profile</button>
    </form>
</main>
<?php unset($_SESSION['s_message']) ?>
<?php unset($_SESSION['e_message']) ?>
<?php require_once "../helpers/footer.php"; ?>