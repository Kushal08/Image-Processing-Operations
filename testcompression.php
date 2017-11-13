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


    $img  = imagecreatefrompng("img_gray.png");
    $img1 = imagecreatefrompng("plane1.png");
    $img2 = imagecreatefrompng("plane2.png");
    $img3 = imagecreatefrompng("plane3.png");
    $img4 = imagecreatefrompng("plane4.png");
    $img5 = imagecreatefrompng("plane5.png");
    $img6 = imagecreatefrompng("plane6.png");
    $img7 = imagecreatefrompng("plane7.png");
    $img8 = imagecreatefrompng("plane8.png");
        

$img9 = $img;


for($x = 0; $x < imagesx($img); ++$x)
    {
        for($y = 0; $y < imagesy($img); ++$y)
        {
            $final = [];
            
			$gray = imagecolorat($img1, $x, $y);
			$readble = imagecolorsforindex($img1, $gray);
			$x1 = $readble["red"];
			if($x1 == 255)
			   array_push($final,1);
			else
			   array_push($final,$x1);
			
			$gray2 = imagecolorat($img2, $x, $y);
			$readble3 = imagecolorsforindex($img2, $gray2);
			$x2 = $readble3["red"];
			if($x2 == 255)
			   array_push($final,1);
			else
			   array_push($final,$x2);
			
			$gray3 = imagecolorat($img3, $x, $y);
			$readble3 = imagecolorsforindex($img3, $gray3);
			$x2 = $readble3["red"];
			if($x2 == 255)
			   array_push($final,1);
			else
			   array_push($final,$x2);
			
			$gray4 = imagecolorat($img4, $x, $y);
			$readble4 = imagecolorsforindex($img4, $gray4);
			$x2 = $readble4["red"];
			if($x2 == 255)
			   array_push($final,1);
			else
			   array_push($final,$x2);
			   
			array_push($final,1);		
			array_push($final,1);		
			array_push($final,1);		
			array_push($final,1);		
			
		
			$a =  implode("",$final);
			$value = bindec($a);
			//echo $value."<br/>";
            $color = imagecolorallocate($img9, $value, $value, $value);

            imagesetpixel($img9, $x, $y, $color);
        }
    }
        imagepng($img9, "plane9.png");


?>

<div class="w3-third"  style="">
<?php
echo '<img src="img_gray.png" height="200" width="200"/><br>Original Image <br>';
echo filesize("img_gray.png")/1024 . 'KB';


?>
</div>
<div class="w3-third"  style="">
.
<div class="w3-third"  style="">
<?php
echo '<img src="plane9.png" height="200" width="200"/><br>Compressed Img<br>';
echo filesize("plane9.png")/1024 . 'KB';
?>

</div>

</div>

</body>
</html>

