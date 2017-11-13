
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
ini_set('max_execution_time', 300);
$count = array();
$final = array();
$total = 0;
$im = imagecreatefromjpeg($name);
$i = 0;
if($im && imagefilter($im, IMG_FILTER_GRAYSCALE))
{
   imagejpeg($im, "hist_gray.jpg");
   //echo 'Image converted to grayscale.';
}
for ($i = 0; $i < 255; $i++)
{
    $count[$i] =  0;
}
for ($i = 0; $i < 255; $i++)
{
    $final[$i] =  0;
}

for($i=0;$i<255;++$i)
	{
    for($x = 0; $x < imagesx($im); ++$x)
    {
        for($y = 0; $y < imagesy($im); ++$y)
        {
            $index = imagecolorat($im, $x, $y);
            $rgb = imagecolorsforindex($im,$index);
            if ($rgb['red'] == $i )
            	$count[$i] = $count[$i]+1;
            	
        }
    }  
    $total = $total + $count[$i];
    $final[$i] =  $count[$i];
    //echo $final[$i];

 }

require_once("jpgraph/src/jpgraph.php");
require_once("jpgraph/src/jpgraph_bar.php");
//create the graph
$graph = new Graph(1000,1000); //set the width and the height
$graph->SetScale("textlin",0,1000); //set the scale of the graph

// Create the bar plots and add it to the graph
$barplot = new BarPlot($final);
$graph->Add($barplot);
$graph->Stroke('myimage.png'); //display the graph

    


}
}
else
$msg="File size Max 256 KB or Invalid file format.";
}   
     
}









?>

<div class="w3-third" >

<?php
echo '<img src="'.$name.'" height="200" width="200"/> Color Image';
?>


</div>


<div class="w3-third" >

<?php
echo '<img src="hist_gray.jpg" height="200" width="200"/> Grey Image';
?>

</div>

<div class="w3-third"  style="">
<?php
echo '<img src="myimage.png" height="200" width="200"/>Histogram';

?>
</div>


</div>

</body>
</html>

