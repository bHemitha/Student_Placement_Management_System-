<?php
require_once "../helpers/config.php";
require_once "../helpers/help.php";

const NAME_REQUIRED = 'Please enter your name';
const NAME_INVALID = 'Username is already taken';
const EMAIL_REQUIRED = 'Please enter your email';
const EMAIL_INVALID = 'Please enter a valid email';
const EMAIL_REGISTERED = 'This email is already registered.<a href="login.php">Log in</a>';
const PASS_REQUIRED = 'Please enter a password';
const CONFIRMATION_REQUIRED = 'Please confirm the password';
const CONFIRMATION_INVALID = 'Password and confirmation password does not match!';
const CAPTCHA_REQUIRED = 'Please fill up the captcha';
const CAPTCHA_INVALID = 'Captcha code is wrong';

$error = [];
$input = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // sanitize and validate username
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $input['username'] = $username;

    $username = trim($username);

    //
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (empty($username)) {
        $error['username'] = NAME_REQUIRED;
    } else if (mysqli_num_rows($result) != 0) {
        $error['username'] = NAME_INVALID;
    }


    // sanitize & validate email
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $input['email'] = $email;
    $email = trim($email);

    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (empty($email)) {
        $error['email'] = EMAIL_REQUIRED;
    } else {
        $val = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($val === false) {
            $error['email'] = EMAIL_INVALID;
        } else if (mysqli_num_rows($result) != 0) {
            $error['email'] = EMAIL_REGISTERED;
            $_SESSION['registered_email'] = $email;
        }
    }

    //sanitise and validate password
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $input['password'] = $password;

    $password = trim($password);

    if (empty($password)) {
        $error['password'] = PASS_REQUIRED;
    }

    //
    $confirmation = filter_input(INPUT_POST, 'confirmation', FILTER_SANITIZE_SPECIAL_CHARS);
    $input['confirmation'] = $confirmation;

    $confirmation = trim($confirmation);

    if (empty($confirmation)) {
        $error['confirmation'] = CONFIRMATION_REQUIRED;
    } else if ($password != $confirmation) {
        $error['confirmation'] = CONFIRMATION_INVALID;
    }

    //
    $captcha = filter_input(INPUT_POST, 'captcha', FILTER_SANITIZE_SPECIAL_CHARS);
    $input['captcha'] = $captcha;

    $captcha = trim($captcha);

    if (empty($captcha)) {
        $error['captcha'] = CAPTCHA_REQUIRED;
    } 
    // else if ($captcha != $_SESSION['captcha_code']) {
    //     $error['captcha'] = CAPTCHA_INVALID;
    // }

    if (count($error) === 0) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username , email,hash) VALUES(?, ? , ?)";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
        mysqli_stmt_execute($stmt);
        $_SESSION['email'] = $email;
        $_SESSION['user_type'] = 's';
        return header('location: login_student.php');
    } else {
        require_once('register_form_student.php');
    }
} else {
    require_once('register_form_student.php');
}