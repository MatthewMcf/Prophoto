<link rel="stylesheet" href="./public/css/modalProfilePicture.css">
<form action="#">
  <h2>Update your profile picture</h2>
  <div class="imgPreview">
    <?php $src = require("../model/getProfilePicPath.php"); ?>
    <img src=<?php echo ($src  . '?=' . rand()) ?> id="output" width="200" />
  </div>
  <div>
    <input type="range" min="0" max="9" step="1" value="0" id="zoom">
    <div id="range-val"></div>
    <p id="message"></p>
    <label for="file">Click here to browse: </label>
    <input id="file" type="file" onchange="loadFile(event)">
    <p>Your image has to be under 300kb. Only .png and .jpg files are supported.</p>
    <button class="button updateButton">Update</button>
  </div>

</form>