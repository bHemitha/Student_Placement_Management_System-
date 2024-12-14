<?php
session_start();

function require_login()
{
    if (!(isset($_SESSION["user_id"]))) {
        $_SESSION['login_message'] = 'Log in first!';
        return header('location: /Student_placement_management/home.php');
    }
}
function filled_company_details()
{
    if ($_SESSION["user_type"] == "cc") {
        return header("Location: profile.php");
    }
}

function company_details_filled()
{
    if ($_SESSION["user_type"] != "cc") {
        return header("Location: fill_details.php");
    }
}

function student_details_filled()
{
    if ($_SESSION["user_type"] != "ss" && $_SESSION["user_type"] != "cc") {
        $_SESSION['e_message'] = 'you make your resume first after that you will able to apply to any company..   ';
        return header("Location: available_job.php");
    }
}

function edit_details()
{
    if ($_SESSION("edit") == 'TRUE') {
        return header('location: edit_profile.php');
    }
}

function prevent_access_after_login()
{
    if ((isset($_SESSION["user_id"]))) {
        return header('location: /Student_placement_management/home.php');
    }
}
function generate_OTP($n)
{
    // Taking a generator string that consists of
    // all the numeric digits
    $generator = "1234567890";

    $result = "";

    for ($i = 1; $i <= $n; $i++) {
        $result .= substr($generator, rand() % strlen($generator), 1);
    }

    return $result;
}

use PHPMailer\PHPMailer\PHPMailer;

// function send_mail($to_email, $subject, $body)
// {
//     require_once("../PHPMailer/src/PHPMailer.php");
//     require_once("../PHPMailer/src/SMTP.php");

//     $mail = new PHPMailer(true);
//     $mail->isSMTP();
//     $mail->isHTML(true);
//     $mail->Host = 'smtp.gmail.com';
//     $mail->SMTPAuth = true;
//     $mail->Username = 'ultrafinance100@gmail.com';
//     $mail->Password = 'xoxipejlvmzibdbp';
//     $mail->SMTPSecure = 'ssl';
//     $mail->Port = 465;

//     $mail->setFrom('ultrafinance100@gmail.com');
//     $mail->addAddress($to_email);
//     $mail->Subject = $subject;
//     $mail->Body = $body;

//     $mail->send();
// }