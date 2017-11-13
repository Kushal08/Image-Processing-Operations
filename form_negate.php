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
<div class="w3-third">
<?php

$id = $_GET['id'];
if ($id == "1")
$filename = "image_negation.php";
elseif ($id == "2")
$filename = "image_log.php";
else
$filename = "image_power.php";
?>

<div >
  <h2>File Upload</h2>
  <form name="imageUpload" method="post" action = "<?php echo $filename ?>"  enctype="multipart/form-data" >
    <table align="center"  >
	  <tr>
	    <td> <label for="file">Upload Image File:</label></td>
		<td> <input type="file" name="imgfile" id="file" /></td>
	  </tr>
	  <tr>
	    
	  </tr>
	  <tr>
	    <td></td>
		<td><input type="submit" name="createmark" value="Submit" /></td>
	  </tr>
	<table>
 </form>

</div>


<?php
if(!empty($demo_image))
echo '<img src="'.$demo_image.'" />';
?>
</form>

</div>




</div>

</body>
</html>

