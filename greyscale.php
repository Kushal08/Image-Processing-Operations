<?php
$im = imagecreatefromjpeg('/home/kushal/m1.jpg');

if($im && imagefilter($im, IMG_FILTER_GRAYSCALE))
{
    echo 'Image converted to grayscale.';

    imagejpeg($im, '/home/kushal/m21.jpg');
}
else
{
    echo 'Conversion to grayscale failed.';
}

?>
