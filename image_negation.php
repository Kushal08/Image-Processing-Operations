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
  

    for($x = 0; $x < imagesx($im); ++$x)
    {
        for($y = 0; $y < imagesy($im); ++$y)
        {
            $index = imagecolorat($im, $x, $y);
            $rgb = imagecolorsforindex($im, $index);
            $color = imagecolorallocate($im, 255 - $rgb['red'], 255 - $rgb['green'], 255 - $rgb['blue']);

            imagesetpixel($im, $x, $y, $color);
        }
    }

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
 echo '<img src="'.$name.'" height="300" width="300" />';
 ?>
 </div>
