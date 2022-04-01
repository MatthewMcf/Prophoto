<link rel="stylesheet" href="./public/css/modalProfilePicture.css">
<!--<form action="#">-->
<div class="modalSection">
<?php
if (!isset($_SESSION)) {
session_start();
}
?>
	<h2>Update your profile picture</h2>
	<div class="imgPreview">
		<img id="modalProfilePic" src="" width="200" />
	</div>
	<div>
		<!--<input type="range" min="0" max="9" step="1" value="0" id="zoom">
		<div id="range-val"></div>-->
		<p id="message"></p>
		<div class="inputWrap">
			<p>Your image has to be under 300kb. Only .png and .jpg files are supported.</p>
			<label id="upload" class="btnSecondary" for="file">Upload your file</label>
			<input id="file" type="file" onchange="loadFile(event)">
		</div>
		<button class="btnPrimary updateButton">Update</button>
	</div>
</div>
<!--</form>-->