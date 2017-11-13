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

<?php

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

$image = imagecreatefrompng($name);
$emboss = array(array(0, -1, 0), array(-1, 4, -1), array(0, -1, 0));
imageconvolution($image, $emboss, 1, 127);

imagepng($image, "conv1.png",9);

$emboss = array(array(2, 0, 0), array(0, -1, 0), array(0, 0, -1));
imageconvolution($image, $emboss, 1,127);

imagepng($image, "conv3.png",9);

$image = imagecreatefrompng($name);
$emboss = array(array(1/18, 1/18, 1/18), array(1/18, 10/18, 1/18), array(1/18, 1/18, 1/18));
imageconvolution($image, $emboss, 1,127);


imagepng($image, "conv4.png",9);


$image = imagecreatefrompng($name);
$emboss = array(array(-1,-2,-1), array(0,0,0), array(1,2,1));
imageconvolution($image, $emboss, 1,127);

imagepng($image, "conv5.png",9);

$image = imagecreatefrompng($name);
$emboss = array(array(-3,-3,5), array(-3,0,5), array(-3,-3,5));
imageconvolution($image, $emboss, 1,127);

imagepng($image, "conv6.png",9);
}
}

?>

<div class="w3-third" >

<?php
echo '<img src="conv1.png" height="200" width="200"/>';
echo '<br>';
echo '<img src="conv6.png" height="200" width="200"/>';
echo '<br>';
?>


</div>

<div class="w3-third" >

<?php
echo '<img src="conv4.png" height="200" width="200"/>';
echo '<br>';
echo '<img src="conv5.png" height="200" width="200"/>';

?>

</div>


<div class="w3-third" >

<?php
echo '<img src="conv3.png" height="200" width="200"/>';
echo '<br>';


?>

</div>

</body>
</html>
