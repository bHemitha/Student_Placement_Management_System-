<?php
require_once "../helpers/config.php";
require_once "../helpers/help.php";

prevent_access_after_login();

const NAME_REQUIRED = 'Please enter your name';
const PASS_REQUIRED = 'Please enter a password';
const WRONG_CREDS = ' Username or password is wrong';

$error = [];
$input = [];
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_unset();

    $is_input_email = true;

    // sanitize and validate username
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_EMAIL);
    $input['username'] = $username;

    $username = trim($username);

    if (empty($username)) {
        $error['username'] = NAME_REQUIRED;
    } else if (!(filter_var($username, FILTER_VALIDATE_EMAIL))) {
        $is_input_email = false;
    }

    //sanitise and validate password
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    $password = trim($password);

    if (empty($password)) {
        $error['password'] = PASS_REQUIRED;
    }

    //
    if ($is_input_email) {
        $sql = "SELECT * FROM users WHERE email=?";
    } else {
        $sql = "SELECT * FROM users WHERE username=?";
    }

    //
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) != 1) {
        $error['username'] = WRONG_CREDS;
    } else {
        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if (!(password_verify($password, $result["hash"]))) {
            $error['username'] = WRONG_CREDS;
        } else if ($result["user_type"] != 'c' && $result["user_type"] != 'cc') {
            $error['username'] = WRONG_CREDS;
        } else {
            //
            session_start();
            $_SESSION["user_id"] = $result["id"];
            $_SESSION["user_type"] = $result["user_type"];
            return header("location: ../features_company/profile.php");
        }
    }
    require_once('login_form_company.php');
} else {
    require_once('login_form_company.php');
}
?>