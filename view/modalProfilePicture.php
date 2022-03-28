<!--<link rel="stylesheet" href="./public/css/modalProfilePicture.css">-->
<!--<form action="#">-->
<div class="modalSection">
<?php 
  if(!isset($_SESSION)) { 
    session_start(); 
  }
  echo $_SESSION["id"];
 ?>
  <h2>Update your profile picture</h2>
  <div class="imgPreview">
    <!--<img src=<?php echo require("../model/getProfilePicPath.php"); ?> alt="profilePic" id="output" width"200">-->
    <?php $src = require("../model/getProfilePicPath.php"); ?>
    <img src=<?php echo ($src  . '?=' . rand()) ?> id="output" width="200" />
  </div>
  <div>
    <!--<input type="range" min="0" max="9" step="1" value="0" id="zoom">
    <div id="range-val"></div>-->
    <p id="message"></p>
    <div class="inputWrap">
        <label class="inputPrimary" for="file">Upload your file</label>
    <!--<input id="file" type="file" onchange="loadFile(event)">-->
        <input id="file" type="file" onchange="loadFile(event)">
        <!--<p>Your image has to be under 300kb. Only .png and .jpg files are supported.</p>-->
    </div>
    <button class="btnSecondary updateButton">Update</button>
  </div>
</div>
<!--</form>-->
