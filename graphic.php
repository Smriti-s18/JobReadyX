<?php
// Make sure no output is sent before the headers
header("Content-Type: image/png");

// Create a 100x100 image
$image = imagecreatetruecolor(100, 100);

// Allocate a red color
$red = imagecolorallocate($image, 255, 0, 0);

// Fill the image with the red color
imagefill($image, 0, 0, $red);

// Output the image in PNG format
imagepng($image);

// Free memory associated with the image
imagedestroy($image);
?>
