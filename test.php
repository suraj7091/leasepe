<?php



session_start();

if(isset($_SESSION['captcha']))
{
unset($_SESSION['captcha']);
}

 



$num_chars=6;//number of characters for captcha image
$characters=array_merge(range(0,9),range('A','Z'),range('a','z'));
//creating combination of numbers & alphabets
shuffle($characters);
//shuffling the characters



//getting the required random 5 characters
$captcha_text="";
for($i=0;$i<$num_chars;$i++)
{
$captcha_text.=$characters[rand(0,count($characters)-1)];
}

$_SESSION['captcha'] =$captcha_text;
// assigning the text into session



header("Content-type: image/png");
// setting the content type as png
$captcha_image=imagecreatetruecolor(140,30);

$captcha_background=imagecolorallocate($captcha_image,225,238,221);
//setting captcha background colour
$captcha_text_colour=imagecolorallocate($captcha_image,58,94,47);
//setting cpatcha text colour

imagefilledrectangle($captcha_image,0,0,140,29,$captcha_background);//creating the rectangle

$font='Arial.ttf';//setting the font path

imagettftext($captcha_image,20,0,11,21,$captcha_text_colour,$font,$captcha_text);
imagepng($captcha_image);
imagedestroy($captcha_image);

echo "

<img src='captcha.php'>";

?>