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

$path = "";
$valid_formats = array("png","jpg", "bmp","jpeg");
$name = $_FILES['imgfile']['name'];
if(strlen($name))
{
if($_FILES['imgfile']['size'] <= 256*1024)
{
$upload_status = move_uploaded_file($_FILES['imgfile']['tmp_name'], $path.$_FILES['imgfile']['name']);
if($upload_status){
$img = imagecreatefrompng($name);
imagefilter($img, IMG_FILTER_GRAYSCALE);
imagepng($img, "grey.png");
}
}
else
$msg="File size Max 256 KB or Invalid file format.";
}
}
?>

<div class="w3-third" >

<?php
echo '<img src="'.$name.'" height="300" width="300"/>';
?>
</div>
<div class="w3-third" >

<?php
echo '<img src="grey.png" height="300" width="300"/>';
?>

</div>

</body>
</html>

