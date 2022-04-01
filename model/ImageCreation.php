<?php
// thumbimage.class.php
class ImageCreation
{
    private $source;
 
    public function __construct($sourceImagePath)
    {
        $this->source = $sourceImagePath;
    }
    
    private function fromPngAndJpeg() 
    {
        $sourcePath = $this->source;
        //$fileExtension = substr(strrchr($sourceImg, '.'), 1); //end(explode('.', $tempName)); 
        $fileExtension = strtolower(pathinfo($this->source,PATHINFO_EXTENSION));
        //echo "file extension = " . $fileExtension;
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

    public function createImage($destImagePath, $newWidth=100)
    {
        $sourceImage = $this->fromPngAndJpeg(); //imagecreatefromjpeg($this->source);
        $originWidth = imagesx($sourceImage);
        $originHeight = imagesy($sourceImage);
        $newHeight = floor($originHeight * ($newWidth / $originWidth));
        $destImage = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($destImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $originWidth, $originHeight);
        imagejpeg($destImage, $destImagePath);
        imagedestroy($sourceImage);
        imagedestroy($destImage);
    }

    public function createSquare($destImagePath)
    {
        $sourceImage = $this->fromPngAndJpeg(); //imagecreatefromjpeg($this->source);
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
