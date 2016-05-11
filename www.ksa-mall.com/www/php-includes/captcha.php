<?php
ob_start();
error_reporting(0);

$parseDomain= parse_url($_SERVER['HTTP_HOST']);
$domainOnly	= str_replace('www.', '', $parseDomain['path']);
preg_match('/(.*?)((\.co)?.[a-z]{2,4})$/i', $domainOnly, $domainArr);

session_name($domainArr[1]);
ini_set('session.cookie_domain', '.'.$domainOnly);
session_set_cookie_params(0, '/', '.'.$domainOnly);
session_start();

function getRandomWord($len = 5) {
    $word = array_merge(range('0', '9'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}

$ranStr = getRandomWord();
$_SESSION["vercode"] = $ranStr;

$height = 38; //CAPTCHA image height
$width = 150; //CAPTCHA image width
$font_size = 24; 

$image_p = imagecreate($width, $height);
$graybg = imagecolorallocate($image_p, 245, 245, 245);
$textcolor = imagecolorallocate($image_p, 34, 34, 34);

imagefttext($image_p, $font_size, -2, 15, 26, $textcolor, '../assets/fonts/mono.ttf', $ranStr);
//imagestring($image_p, $font_size, 5, 3, $ranStr, $white);
imagepng($image_p);
?>
