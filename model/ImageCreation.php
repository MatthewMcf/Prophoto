<?php
// thumbimage.class.php
class ImageCreation
{
    private $source;
 
    public function __construct($sourceImagePath)
    {
        $this->source = $sourceImagePath;
    }
    // take the path source image and return an Gdimage object
    private function fromPngAndJpeg() 
    {
        $sourcePath = $this->source;
        $fileExtension = strtolower(pathinfo($this->source,PATHINFO_EXTENSION));
        if ($fileExtension === "jpeg") {
            $result = imagecreatefromjpeg($sourcePath);
        } else if ($fileExtension === "jpg") {
            $result = imagecreatefromjpeg($sourcePath);
        } else if ($fileExtension === "png") {
            $result = imagecreatefrompng($sourcePath);
        } else {
            echo " File format not supported .. ";
        }
        return $result;
    }

    // resize the source image (png or jpg)to a new size (the width size with newWidth in pixel) 
    // and save it into the destinationPath in jpg format
    // the ratio remain the same
    public function createImage($destImagePath, $newWidth=100)
    {
        $sourceImage = $this->fromPngAndJpeg();
        $originWidth = imagesx($sourceImage);
        $originHeight = imagesy($sourceImage);
        $newHeight = floor($originHeight * ($newWidth / $originWidth));
        $destImage = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($destImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $originWidth, $originHeight);
        imagejpeg($destImage, $destImagePath);
        imagedestroy($sourceImage);
        imagedestroy($destImage);
    }

    // Transform the source image into a square by cuting the extra part (width or height) and save it into destImagePath
    // the source image can be a png, jpg or jpeg file and the result (destination) file will be a always a jpg file
    public function createSquare($destImagePath)
    {
        $sourceImage = $this->fromPngAndJpeg();
        $originWidth = imagesx($sourceImage);
        $originHeight = imagesy($sourceImage);
        $destSize = ($originWidth>$originHeight)? $originHeight: $originWidth;
        $destImage = imagecreatetruecolor($destSize,$destSize);
        imagecopy($destImage, $sourceImage, 0, 0, ($originWidth-$destSize)/2,($originHeight-$destSize)/2, $destSize, $destSize);
        imagejpeg($destImage, $destImagePath);
        imagedestroy($sourceImage);
        imagedestroy($destImage);
    }
}
