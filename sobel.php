<?php

?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<style>
hr { 
    display: block;
    margin-top: 1.0em;
    margin-bottom: 1.0em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
} 

label {
    width:180px;
    clear:left;
    text-align:right;
    padding-right:10px;
}

input, label {
    float:left;
}
</style>
<body>

<div class="w3-container w3-orange">
  <h1>Image Processing Tools</h1>      
</div>
<br/>
	<br/>
<div class="w3-row-padding">

<hr>
<div class="w3-third">
<?php

// Define our negate function so its portable for 
// php versions without imagefilter()
function negate($im)
{
$emboss = array(array(-1, 0, 1), array(-2, 0, 2), array(-1, 0, 1));
imageconvolution($im, $emboss, 1, 127);


    return(true);
}


$demo_image= "";
if(isset($_POST['createmark']) and $_POST['createmark'] == "Submit")
{

$path = "watermark/";
$valid_formats = array("jpg", "bmp","jpeg");
$name = $_FILES['imgfile']['name'];
if(strlen($name))
{
list($txt, $ext) = explode(".", $name);
if(in_array($ext,$valid_formats) && $_FILES['imgfile']['size'] <= 256*1024)
{
$upload_status = move_uploaded_file($_FILES['imgfile']['tmp_name'], $path.$_FILES['imgfile']['name']);
}
$im = imagecreatefromjpeg($name);

if($im && negate($im))
{
    //echo 'Image successfully converted to negative colors.';

    imagejpeg($im, 'watermark/n'.$name, 100);
    imagedestroy($im);
    $im1 = imagecreatefromjpeg($name);
$emboss = array(array(-1, -2, -1), array(0, 0, 0), array(1, 2, 1));
imageconvolution($im1, $emboss, 1, 127);
imagejpeg($im1, "prewitt.jpg");
    echo '<img src="watermark/n'.$name.'" height="300" width="300" />';
}
else
{
    echo 'Converting to negative colors failed.';
}

}
else
$msg="File size Max 256 KB or Invalid file format.";
}


?>

 </div>

 
 

 <div class="w3-third">
 <?php
 echo '<img src="prewitt.jpg" height="300" width="300" />';
 ?>
 </div>

 <div class="w3-third">
 <?php
 echo '<img src="'.$name.'" height="300" width="300" />';
 ?>
 </div>
