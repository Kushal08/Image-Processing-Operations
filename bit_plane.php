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
imagepng($img, "img_gray.png");
// to grayscale


// just 1 pixel that describe the whole image

   for($x = 0; $x < imagesx($img); ++$x)
    {
        for($y = 0; $y < imagesy($img); ++$y)
        {

			$gray = imagecolorat($img, $x, $y);
			$readble = imagecolorsforindex($img, $gray);
			$x1 = $readble["red"];
			$bin = sprintf( "%08d", decbin($x1));
			$array= str_split($bin);
			if($array[0] == '1')
            	$color = imagecolorallocate($img, 255, 255, 255);
            else
            	$color = imagecolorallocate($img, 0, 0, 0);
            

            imagesetpixel($img, $x, $y, $color);
        }
    }
    
    imagepng($img, "plane1.png");
    
    $img = imagecreatefrompng($name);
imagefilter($img, IMG_FILTER_GRAYSCALE);
// to grayscale


// just 1 pixel that describe the whole image

   for($x = 0; $x < imagesx($img); ++$x)
    {
        for($y = 0; $y < imagesy($img); ++$y)
        {

			$gray = imagecolorat($img, $x, $y);
			$readble = imagecolorsforindex($img, $gray);
			$x1 = $readble["red"];
			$bin = sprintf( "%08d", decbin($x1));
			$array= str_split($bin);
			if($array[1] == '1')
            	$color = imagecolorallocate($img, 255, 255, 255);
            else
            	$color = imagecolorallocate($img, 0, 0, 0);
            

            imagesetpixel($img, $x, $y, $color);
        }
    }
    
    imagepng($img, "plane2.png");
    
    $img = imagecreatefrompng($name);
imagefilter($img, IMG_FILTER_GRAYSCALE);
// to grayscale


// just 1 pixel that describe the whole image

   for($x = 0; $x < imagesx($img); ++$x)
    {
        for($y = 0; $y < imagesy($img); ++$y)
        {

			$gray = imagecolorat($img, $x, $y);
			$readble = imagecolorsforindex($img, $gray);
			$x1 = $readble["red"];
			$bin = sprintf( "%08d", decbin($x1));
			$array= str_split($bin);
			if($array[2] == '1')
            	$color = imagecolorallocate($img, 255, 255, 255);
            else
            	$color = imagecolorallocate($img, 0, 0, 0);
            

            imagesetpixel($img, $x, $y, $color);
        }
    }
    
    imagepng($img, "plane3.png");
    
    $img = imagecreatefrompng($name);
imagefilter($img, IMG_FILTER_GRAYSCALE);
// to grayscale


// just 1 pixel that describe the whole image

   for($x = 0; $x < imagesx($img); ++$x)
    {
        for($y = 0; $y < imagesy($img); ++$y)
        {

			$gray = imagecolorat($img, $x, $y);
			$readble = imagecolorsforindex($img, $gray);
			$x1 = $readble["red"];
			$bin = sprintf( "%08d", decbin($x1));
			$array= str_split($bin);
			if($array[3] == '1')
            	$color = imagecolorallocate($img, 255, 255, 255);
            else
            	$color = imagecolorallocate($img, 0, 0, 0);
            

            imagesetpixel($img, $x, $y, $color);
        }
    }
    
    imagepng($img, "plane4.png");
    
    $img = imagecreatefrompng($name);
imagefilter($img, IMG_FILTER_GRAYSCALE);
// to grayscale


// just 1 pixel that describe the whole image

   for($x = 0; $x < imagesx($img); ++$x)
    {
        for($y = 0; $y < imagesy($img); ++$y)
        {

			$gray = imagecolorat($img, $x, $y);
			$readble = imagecolorsforindex($img, $gray);
			$x1 = $readble["red"];
			$bin = sprintf( "%08d", decbin($x1));
			$array= str_split($bin);
			if($array[4] == '1')
            	$color = imagecolorallocate($img, 255, 255, 255);
            else
            	$color = imagecolorallocate($img, 0, 0, 0);
            

            imagesetpixel($img, $x, $y, $color);
        }
    }
    
    imagepng($img, "plane5.png");
    
    $img = imagecreatefrompng($name);
imagefilter($img, IMG_FILTER_GRAYSCALE);
// to grayscale


// just 1 pixel that describe the whole image

   for($x = 0; $x < imagesx($img); ++$x)
    {
        for($y = 0; $y < imagesy($img); ++$y)
        {

			$gray = imagecolorat($img, $x, $y);
			$readble = imagecolorsforindex($img, $gray);
			$x1 = $readble["red"];
			$bin = sprintf( "%08d", decbin($x1));
			$array= str_split($bin);
			if($array[5] == '1')
            	$color = imagecolorallocate($img, 255, 255, 255);
            else
            	$color = imagecolorallocate($img, 0, 0, 0);
            

            imagesetpixel($img, $x, $y, $color);
        }
    }
    
    imagepng($img, "plane6.png");
    
    $img = imagecreatefrompng($name);
imagefilter($img, IMG_FILTER_GRAYSCALE);
// to grayscale


// just 1 pixel that describe the whole image

   for($x = 0; $x < imagesx($img); ++$x)
    {
        for($y = 0; $y < imagesy($img); ++$y)
        {

			$gray = imagecolorat($img, $x, $y);
			$readble = imagecolorsforindex($img, $gray);
			$x1 = $readble["red"];
			$bin = sprintf( "%08d", decbin($x1));
			$array= str_split($bin);
			if($array[6] == '1')
            	$color = imagecolorallocate($img, 255, 255, 255);
            else
            	$color = imagecolorallocate($img, 0, 0, 0);
            

            imagesetpixel($img, $x, $y, $color);
        }
    }
    
    imagepng($img, "plane7.png");
    
    $img = imagecreatefrompng($name);
imagefilter($img, IMG_FILTER_GRAYSCALE);
// to grayscale


// just 1 pixel that describe the whole image

   for($x = 0; $x < imagesx($img); ++$x)
    {
        for($y = 0; $y < imagesy($img); ++$y)
        {

			$gray = imagecolorat($img, $x, $y);
			$readble = imagecolorsforindex($img, $gray);
			$x1 = $readble["red"];
			$bin = sprintf( "%08d", decbin($x1));
			$array= str_split($bin);
			if($array[7] == '1')
            	$color = imagecolorallocate($img, 255, 255, 255);
            else
            	$color = imagecolorallocate($img, 0, 0, 0);
            

            imagesetpixel($img, $x, $y, $color);
        }
    }
    
    imagepng($img, "plane8.png");
    

}
}
else
$msg="File size Max 256 KB or Invalid file format.";
}
}
?>

<div class="w3-third" >

<?php
echo '<img src="plane1.png" height="200" width="200"/>';
echo '<img src="plane2.png" height="200" width="200"/>';
echo '<img src="plane7.png" height="200" width="200"/>';
echo '<img src="plane8.png" height="200" width="200"/>';

?>



</div>


<div class="w3-third"  style="">
<?php
echo '<img src="plane3.png" height="200" width="200"/>';
echo '<img src="plane4.png" height="200" width="200"/>';

?>
</div>

<div class="w3-third"  style="">
<?php
echo '<img src="plane5.png" height="200" width="200"/>';
echo '<img src="plane6.png" height="200" width="200"/>';
?>
</div>

</div>

</body>
</html>

