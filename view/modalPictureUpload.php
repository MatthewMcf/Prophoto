<link rel="stylesheet" href="./public/css/modalProfilePicture.css">
<!--<form action="#">-->
<div class="modalSection">
<?php 
  if(!isset($_SESSION)) { 
    session_start(); 
  }
 ?>
  <h2>Upload a picture</h2>
  <div class="imgPreviewUpload">
    <img id="modalUploadedImage" src="" width="500" />
  </div>
  <div>
    <!--<input type="range" min="0" max="9" step="1" value="0" id="zoom">
    <div id="range-val"></div>-->
    <p id="message"></p>
    <div class="inputWrap">
        <label id="upload" class="btnSecondary" for="file">Choose a file</label>
        <input id="file" type="file" onchange="loadUploadedImage(event)">
        <!--<p>Your image has to be under 300kb. Only .png and .jpg files are supported.</p>-->
    </div>
    <button class="btnPrimary updateButton">Upload</button>
  </div>
</div>
<!--</form>-->
