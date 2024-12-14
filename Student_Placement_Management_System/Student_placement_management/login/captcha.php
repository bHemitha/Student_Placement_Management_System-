<?php
session_start();

// Generate captcha code
$random_num = md5(random_bytes(64));
$captcha_code = substr($random_num, 0, 6);

// Assign captcha in session
$_SESSION['captcha_code'] = $captcha_code;
$layer = imagecreatefromjpeg("background.jpeg");
$layer = imagecrop($layer, [ 'x' => 0, 'y' => 0, 'width' => 168, 'height' => 37 ]);
$captcha_text_color = imagecolorallocate($layer, 0, 0, 0);
imagestring($layer, 5, 55, 10, $captcha_code, $captcha_text_color);
header("Content-type: image/jpeg");
imagejpeg($layer);