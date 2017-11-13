<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<style>

</style>
<body>

<div class="w3-container w3-orange">
  <h1>Image Processing Tools</h1>      
</div>
<br/>
	<br/>
<div class="w3-row-padding">

<hr>
<?php

$demo_image= "";
if(isset($_POST['createmark']) and $_POST['createmark'] == "Submit")
{

$font_path = "/var/www/html/project/arial.ttf"; // Font file
$font_size = 30; // in pixcels
$water_mark_text_2 = $_POST['inputtext']; // Watermark Text

function watermark_text($oldimage_name, $new_image_name)
{
global $font_path, $font_size, $water_mark_text_2;
list($owidth,$oheight) = getimagesize($oldimage_name);

$width = $owidth ;
$height = $oheight; 
$image = imagecreatetruecolor($width, $height);
$image_src = imagecreatefromjpeg($oldimage_name);
imagecopyresampled($image, $image_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
$blue = imagecolorallocate($image, 79, 166, 185);
imagettftext($image, $font_size, 0, 68, 190, $blue, $font_path, $water_mark_text_2);
imagejpeg($image, $new_image_name, 100);
imagedestroy($image);
unlink($oldimage_name);
return true;
}

function watermark_image($oldimage_name, $new_image_name)
{
global $image_path;
list($owidth,$oheight) = getimagesize($oldimage_name);
$width = $height = 400; 
$im = imagecreatetruecolor($width, $height);
$img_src = imagecreatefromjpeg($oldimage_name);
imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
$watermark = imagecreatefrompng($image_path);
list($w_width, $w_height) = getimagesize($image_path); 
$pos_x = $width - $w_width; 
$pos_y = $height - $w_height;
imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
imagejpeg($im, $new_image_name, 100);
imagedestroy($im);
unlink($oldimage_name);
return true;
}

$path = "watermark/";
$valid_formats = array("jpg", "bmp","jpeg");
$name = $_FILES['imgfile']['name'];
if(strlen($name))
{
list($txt, $ext) = explode(".", $name);
if(in_array($ext,$valid_formats) && $_FILES['imgfile']['size'] <= 256*1024)
{
$upload_status = move_uploaded_file($_FILES['imgfile']['tmp_name'], $path.$_FILES['imgfile']['name']);
if($upload_status){
$new_name = $path.time().".jpg";
// Here you have to user functins watermark_text or watermark_image
if(watermark_text($path.$_FILES['imgfile']['name'], $new_name))
$demo_image = $new_name;
}
}
else
$msg="File size Max 256 KB or Invalid file format.";
}
}
?>

<div class="w3-third" >

<?php
echo '<img src="'.$name.'" height="400" width="400"/>';
?>



</div>


<div class="w3-third"  style="">
<?php
if(!empty($demo_image))
echo '<img src="'.$demo_image.'" height="400" width="400" />';

?>
</div>



</div>

</body>
</html>

