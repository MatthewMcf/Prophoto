<?php ob_start();?>
    <h1>Pro Photo</h1>

	<div id="call-to-action">
		Placeholder Call-To-Action.
	</div>
	<div id="call-to-action-secondary">
		Secondary Call-To-Action text.
	</div>
	
	<div class="search-bar">
		<input type="text" placeholder="Search for images">
		<button type="submit">Search</button>
	</div>

	<br>


	<h2>Popular Tags</h2>
	<div id="popular-tags">
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Street</a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Landscape</a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Portrait</a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Wildlife</a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Photojournalism</a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Sport</a></div>
	</div>

	<h2>Popular Images</h2>
	<div id="popular-images">
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a></div>

	</div>

    <!-- Logged In -->

    <div id="profile-information">

    </div>


<?php $content = ob_get_clean();?>
<?php require('template.php');?>
