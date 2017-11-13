<?php
// Define our negate function so its portable for 
// php versions without imagefilter()
ini_set('max_execution_time', 300);
$count = array();
$final = array();
$sum = array();
$match = array();
$total = 0;
$im = imagecreatefromjpeg('d.jpg');
$i = 0;
if($im && imagefilter($im, IMG_FILTER_GRAYSCALE))
{
   echo 'Image converted to grayscale.';
}
for ($i = 0; $i < 255; $i++)
{
    $count[$i] =  0;
}
for ($i = 0; $i < 255; $i++)
{
    $sum[$i] =  0;
}
for ($i = 0; $i < 255; $i++)
{
    $final[$i] =  0;
}
for ($i = 0; $i < 255; $i++)
{
    $match[$i] =  0;
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
    $final[$i] =  ($count[$i]/$total)*100;


 }


for($i=0;$i<255;++$i)
	{	$x = 0;
		$j = $i;
		while ($j>0)
			{
				$sum[$i] = $sum[$i]+ $final[$j];
				$j = $j-1;				
			}
			$sum[$i]=intval(31*($sum[$i]/100));
		if($sum[$i] < 255)
		{
		if($match[$sum[$i]] == 0 )
		$match[$sum[$i]] = $final[$i];
		else if ($match[$sum[$i]] != 0)
		{
		$x = $match[$sum[$i]]+$final[$i];
		$match[$sum[$i]]=$x;		
		}
		else
			{
			}
		echo "sum".$sum[$i];
		echo "final".$final[$i];
		echo "match".$match[$sum[$i]];
		echo "<br/>"; 	 
	}
	}

require_once("jpgraph/src/jpgraph.php");
require_once("jpgraph/src/jpgraph_bar.php");
//create the graph
$graph = new Graph(1000,1000); //set the width and the height
$graph->SetScale("textlin",0,100); //set the scale of the graph

// Create the bar plots and add it to the graph
$barplot = new BarPlot($match);
$graph->Add($barplot);
$graph->Stroke('myimage1.png'); //display the graph

?>
