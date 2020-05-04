<?php 
	// must specify Class File
	require_once 'resize-image.php';
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Resize Image - Demo</title>
</head>
    <body>
        <?php 
            // initialise new Image
            $myImage = new Img('img/myImage.gif');
        ?>

        <h2>Original Image</h2>
        <?php 
            // display original image with specified alt attribute
            echo $myImage->display_original_image('my Image');
        ?>

        <h2>Resized Image (0.5 Scale)</h2>
        <?php
			// first we must call class method to scale the image
			$myImage->resize(0.5);
            // display Scaled image with alt attribute
            echo $myImage->display_resized_image('Small myImage');
        ?>

		<h2>Resized Image (2.0 Scale)</h2>
        <?php
			// first we must call class method to scale the image
			$myImage->resize(2);
            // display Scaled image with alt attribute
            echo $myImage->display_resized_image('Big myImage');
        ?>
    
    </body>
</html>
