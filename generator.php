<?php session_start();

header('Content-type: image/png');


$zeichenf= rand(0,99999);
$_SESSION['get_code']=$zeichenf;

$img = ImageCreateFromPNG('files/mu.png');
$color = ImageColorAllocate($img, 160, 155, 150);
$angle = rand(0,5); 
$fontsize = 18;
$font = 'files/extralucid.ttf';
 

$pos_x = rand(5,35);
$pos_y = rand(23,26);

imagettftext($img, $fontsize, $angle, $pos_x, $pos_y, $color, $font, $zeichenf);
imagepng($img);

imagedestroy($img);



?>