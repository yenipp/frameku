<?php
// (X) QUICK FUNCTION REFERENCE
/* imagecopy (
* DESTINATION, SOURCE,
* DESTINATION-X, DESTINATION-Y,
* SOURCE-X, SOURCE-Y,
* SOURCE-WITDTH, SOURCE-HEIGHT
* )
*/

// (A) SETTINGS
$sourceS = "source.jpg"; // SOURCE IMAGE
$sourceW = "frame.png"; // WATERMARK IMAGE
$target = "watermarked.jpg"; // WATERMARKED IMAGE
$quality = 60; // WATERMARKED IMAGE QUALITY (0 to 100)
$posX = 0; // PLACE WATERMARK AT LEFT CORNER
$posY = 0; // PLACE WATERMARK AT TOP CORNER

// (B) CREATE IMAGE OBJECTS
$imgS = imagecreatefromjpeg($sourceS);
$imgW = imagecreatefrompng($sourceW);

// (C) APPLY WATERMARK
imagecopy(
    $imgS,
    $imgW, // COPY WATERMARK ONTO SOURCE IMAGE
    $posX,
    $posY, // PLACE WATERMARK AT TOP LEFT CORNER
    0,
    0,
    imagesx($imgW),
    imagesY($imgW) // COPY FULL WATERMARK IMAGE WITHOUT CLIPPING
);

// (D) OUTPUT
imagejpeg($imgS, $target, $quality);
echo "Saved to $target";
