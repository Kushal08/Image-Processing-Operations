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
            $rgb = imagecolorsforindex($im,$index);
            $color = imagecolorallocate($im, intval(20*pow($rgb['red'], 1/2.5)), intval(20*pow($rgb['green'],1/2.5)), intval(2*pow($rgb['blue'],1/2.5)));

            imagesetpixel($im, $x, $y, $color);
        }
    }

    return(true);
}

$im = imagecreatefromjpeg('messi.jpg');

if($im && negate($im))
{
    echo 'Image successfully converted to negative colors.';

    imagejpeg($im, 'watermark/messi1.jpg', 100);

    imagedestroy($im);
}
else
{
    echo 'Converting to negative colors failed.';
}
?>
