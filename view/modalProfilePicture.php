  <h2>update your profile picture</h2>

  <div class="profile-pic">
    <label class="-label" for="file">
      <span class="glyphicon glyphicon-camera"></span>
      <span>Click here to browse</span>
    </label>
    <input id="file" type="file" onchange="loadFile(event)"/>
    <img src="./data/user_profile.jpg" id="output" width="200" />
  </div>


  <input type="range" min="0" max="9" step="1" value="0" id="zoom" /> <div id="range-val"></div>
  <p id="message"></p>
    <p>Select your your image. It has to be under 300kb, only png and jpeg files are supported.</p>
  <button class="button updateButton">update</button>
  <button class="button closeButton">close</button>




