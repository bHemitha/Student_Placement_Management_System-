<?php
require_once "../helpers/config.php";
require_once "../helpers/help.php";

require_login();
// filled_company_details();
const NAME_REQUIRED = 'Please enter company name';
const NAME_INVALID = 'Company name is already taken';
const EMAIL_REQUIRED = 'Please enter your company email';
const EMAIL_INVALID = 'Please enter a valid email';
const EMAIL_TAKEN = 'Company email is already taken';
const PHONE_REQUIRED = 'Please enter company phone';
const PHONE_INVALID = 'Please enter a valid phone number';
const MANAGER_REQUIRED = 'Please enter manager name';
const DESC_REQUIRED = 'Please enter description';
const CAPTCHA_REQUIRED = 'Please fill up the captcha';
const CAPTCHA_INVALID = 'Captcha code is wrong';

$error = [];
$input = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // sanitize and validate c_name
    $c_name = filter_input(INPUT_POST, 'c_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $input['c_name'] = $c_name;
    $c_name = trim($c_name);

    $sql = "SELECT * FROM `COMPANY` WHERE c_name = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $c_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (empty($c_name)) {
        $error['c_name'] = NAME_REQUIRED;
    } else if (mysqli_num_rows($result) != 0 && !isset($_SESSION['edit_profile'])) {
        $error['c_name'] = NAME_INVALID;
    }


    // sanitize & validate c_email
    $c_email = filter_input(INPUT_POST, 'c_email', FILTER_SANITIZE_EMAIL);
    $input['c_email'] = $c_email;
    $c_email = trim($c_email);

    $sql = "SELECT * FROM company WHERE c_email=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $c_email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (empty($c_email)) {
        $error['c_email'] = EMAIL_REQUIRED;
    } else {
        $val = filter_var($c_email, FILTER_VALIDATE_EMAIL);
        if ($val === false) {
            $error['c_email'] = EMAIL_INVALID;
        } else if (mysqli_num_rows($result) != 0 && !isset($_SESSION['edit_profile'])) {
            $error['c_email'] = EMAIL_TAKEN;
            $_SESSION['c_email'] = $c_email;
        }
    }

    // sanitize & validate c_phone
    $c_phone = filter_input(INPUT_POST, 'c_phone', FILTER_VALIDATE_INT);
    $input['c_phone'] = $c_phone;
    if (empty($c_phone)) {
        $error['c_phone'] = PHONE_REQUIRED;
    }
    if (!preg_match('/^[0-9]{10}+$/', $c_phone)) {
        $error['c_phone'] = PHONE_INVALID;
    }

    // sanitize & validate c_manager
    $c_manager = filter_input(INPUT_POST, 'c_manager', FILTER_SANITIZE_SPECIAL_CHARS);
    $input['c_manager'] = $c_manager;
    $c_manager = trim($c_manager);

    if (empty($c_manager)) {
        $error['c_manager'] = MANAGER_REQUIRED;
    }

    // sanitize & validate c_desc
    $c_desc = filter_input(INPUT_POST, 'c_desc', FILTER_SANITIZE_SPECIAL_CHARS);
    $input['c_desc'] = $c_desc;
    $c_desc = trim($c_desc);

    if (empty($c_desc)) {
        $error['c_desc'] = DESC_REQUIRED;
    }

    // captcha
    $captcha = filter_input(INPUT_POST, 'captcha', FILTER_SANITIZE_SPECIAL_CHARS);
    $input['captcha'] = $captcha;

    $captcha = trim($captcha);

    if (empty($captcha)) {
        $error['captcha'] = CAPTCHA_REQUIRED;
    } else if ($captcha != $_SESSION['captcha_code']) {
        $error['captcha'] = CAPTCHA_INVALID;
    }

    if (count($error) === 0 && !isset($_SESSION['edit_profile'])) {
        $sql = "INSERT INTO company (c_id,c_name,c_email,c_phone,c_manager,c_desc) VALUES(?, ? , ?, ? , ? , ?)";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "ississ", $_SESSION['user_id'], $c_name, $c_email, $c_phone, $c_manager, $c_desc);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $sql = "UPDATE users SET user_type='cc' WHERE id=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "i", $_SESSION['user_id']);
        mysqli_stmt_execute($stmt);
        $_SESSION['user_type'] = 'cc';
        if (!$result) {
            $_SESSION['s_message'] = "Profile edited successfully!";
        } else {
            $_SESSION['e_message'] = "Plese try again later..";
        }

        return header('location: profile.php');
    } else if (count($error) === 0 && isset($_SESSION['edit_profile'])) {
        $sql = "UPDATE COMPANY SET c_name=? ,c_email=? ,c_phone=? ,c_manager = ? , c_desc=? WHERE C_ID=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "ssissi", $c_name, $c_email, $c_phone, $c_manager, $c_desc, $_SESSION['user_id']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$result) {
            $_SESSION['s_message'] = "Profile edited successfully!";
        } else {
            $_SESSION['e_message'] = "Plese try again later..";
        }
        unset($_SESSION['edit_profile']);
        return header('location: profile.php');
    } else {
        require_once('fill_details_form.php');
    }
} else {
    require_once('fill_details_form.php');
}