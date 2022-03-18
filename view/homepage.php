<?php ob_start();?>
    <h1>Pro Photo</h1>

	<div id="call-to-action">
		Placeholder Call-To-Action.
	</div>
	<div id="call-to-action-secondary">
		Secondary Call-To-Action text.
	</div>
	
	<div class="search-bar">
	<div id="search-options">
			<a href="#">Options</a>
			<ul class=sub-nav>
				<li>Tags</li>
				<li>Photographer</li>
			</ul>
		</div>
		<div class="bar-container">
			<input type="text" placeholder="Search for images">
			<button type="submit">Search</button>
		</div>

	</div>

	<br>


	<h2>Heading about the basic images</h2>
	<div id="popular-images">
		<div class="photo-card">
			<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a></div>
			<div class="photo-card-footer">
				<div class="photographer-info"><img class="icon" src="public/images/default_profile_picture.png" alt="Photographer">Matt</div>
				<div class="purchase-button"><a href="">Purchase</a></div>
			</div>
		</div>
		<div class="photo-card">
			<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a></div>
			<div class="photo-card-footer">
				<div class="photographer-info"><img class="icon" src="public/images/default_profile_picture.png" alt="Photographer">JK</div>
				<div class="purchase-button"><a href="">Purchase</a></div>
			</div>
		</div>
		<div class="photo-card">
			<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a></div>
			<div class="photo-card-footer">
				<div class="photographer-info"><img class="icon" src="public/images/default_profile_picture.png" alt="Photographer">Camila</div>
				<div class="purchase-button"><a href="">Purchase</a></div>
			</div>
		</div>

	</div>

	<h2>Popular Tags</h2>
	<div id="popular-tags">
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Street</a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Landscape</a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Portrait</a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Wildlife</a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Photojournalism</a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Sport</a></div>
	</div>



    <!-- Logged In -->

    <div id="profile-information">

    </div>


<?php $content = ob_get_clean();?>
<?php require('template.php');?>
