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
<form name="imageUpload" method="post" action = "testcompression.php"  enctype="multipart/form-data" >
    <table align="center"  >
	  <tr>
	  </tr>
	  <tr>	    
	  </tr>
	  <tr>
	    <td></td>
		<td><input type="submit" name="createmark" value="Click Here to Compress the Image." /></td>
	  </tr>
	<table>
 </form>
<div class="w3-row-padding">

<hr>
<?php
ini_set('max_execution_time', 300);


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

$img1 = $img;
$img2 = $img;
$img3 = $img;
$img4 = $img;
$img5 = $img;
$img6 = $img;
$img7 = $img;
$img8 = $img;
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
            

            imagesetpixel($img1, $x, $y, $color);
        }
    }
    
    imagepng($img1, "plane1.png");
    
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
            

            imagesetpixel($img2, $x, $y, $color);
        }
    }
    
    imagepng($img2, "plane2.png");
    
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
            

            imagesetpixel($img3, $x, $y, $color);
        }
    }
    
    imagepng($img3, "plane3.png");
    
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
            

            imagesetpixel($img4, $x, $y, $color);
        }
    }
    
    imagepng($img4, "plane4.png");
    
    $img = imagecreatefrompng($name);
imagefilter($img4, IMG_FILTER_GRAYSCALE);
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
            

            imagesetpixel($img5, $x, $y, $color);
        }
    }
    
    imagepng($img5, "plane5.png");
    
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
            

            imagesetpixel($img6, $x, $y, $color);
        }
    }
    
    imagepng($img6, "plane6.png");
    
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
            

            imagesetpixel($img7, $x, $y, $color);
        }
    }
    
    imagepng($img7, "plane7.png");
    
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
            

            imagesetpixel($img8, $x, $y, $color);
        }
    }
    
    imagepng($img8, "plane8.png");
    


}
}
else
$msg="File size Max 256 KB or Invalid file format.";
}   
     
}









?>

<div class="w3-third" >

<?php
echo '<img src="plane1.png" height="200" width="200"/> Plane 1';
echo '<img src="plane2.png" height="200" width="200"/>Plane 2';
echo '<img src="plane7.png" height="200" width="200"/>Plane 7';

?>



</div>


<div class="w3-third"  style="">
<?php
echo '<img src="plane3.png" height="200" width="200"/>Plane 3';
echo '<img src="plane4.png" height="200" width="200"/>Plane 4';
echo '<img src="plane8.png" height="200" width="200"/>Plane 8';

?>
</div>

<div class="w3-third"  style="">
<?php
echo '<img src="plane5.png" height="200" width="200"/>Plane 5';
echo '<img src="plane6.png" height="200" width="200"/>Plane 6';
?>

</div>

</div>

</body>
</html>

