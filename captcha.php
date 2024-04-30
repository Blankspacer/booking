<?php
session_start();

// Generate a random CAPTCHA code
$captchaCode = generateRandomString(6);
$_SESSION['captcha_code'] = $captchaCode;

// Generate CAPTCHA image
header('Content-type: image/jpeg');

$image = imagecreatetruecolor(120, 30);
$bgColor = imagecolorallocate($image, 255, 255, 255);
$textColor = imagecolorallocate($image, 0, 0, 0);

imagefill($image, 0, 0, $bgColor);
imagestring($image, 5, 5, 5, $captchaCode, $textColor);

imagejpeg($image);
imagedestroy($image);

// Helper function to generate random string
function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
