
<?php


$img1 = imagecreatefrompng("img.png");
$img2 = imagecreatefrompng("plane1.png");


   for($x = 0; $x < imagesx($img1); ++$x)
    {
        for($y = 0; $y < imagesy($img1); ++$y)
        {

			$gray = imagecolorat($img1, $x, $y);
			$readble = imagecolorsforindex($img1, $gray);

			$gray1 = imagecolorat($img2, $x, $y);
			$readble1 = imagecolorsforindex($img2, $gray1);
				
     $color = imagecolorallocate($img1, $readble["red"]-$readble1["red"], $readble["green"]-$readble1["green"], $readble["blue"]-$readble1["blue"]);
	 imagesetpixel($img1, $x, $y, $color);
     
        }
    }
    
    imagepng($img1, "sub.png");
       

?>
