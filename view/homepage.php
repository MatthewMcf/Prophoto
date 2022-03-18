<?php ob_start();?>
    <h1>Pro Photo</h1>

	<div id="callToAction">
		Placeholder Call-To-Action.
	</div>
	<div id="callToActionSecondary">
		Secondary Call-To-Action text.
	</div>
	
	<div class="searchBar">
	<div id="searchOptions">
			<a href="#">Options</a>
			<ul class=subNav>
				<li>Tags</li>
				<li>Photographer</li>
			</ul>
		</div>
		<div class="barContainer">
			<input type="text" placeholder="Search for images">
			<button type="submit">Search</button>
		</div>

	</div>

	<br>


	<h2>Heading about the basic images</h2>
	<div id="popularImages">
		<div class="photoCard">
			<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a></div>
			<div class="photoCardFooter">
				<div class="photographerInfo"><img class="icon" src="public/images/default_profile_picture.png" alt="Photographer">Matt</div>
				<div class="purchaseButton"><a href="">Purchase</a></div>
			</div>
		</div>
		<div class="photoCard">
			<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a></div>
			<div class="photoCardFooter">
				<div class="photographerInfo"><img class="icon" src="public/images/default_profile_picture.png" alt="Photographer">JK</div>
				<div class="purchaseButton"><a href="">Purchase</a></div>
			</div>
		</div>
		<div class="photoCard">
			<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a></div>
			<div class="photoCardFooter">
				<div class="photographerInfo"><img class="icon" src="public/images/default_profile_picture.png" alt="Photographer">Camila</div>
				<div class="purchaseButton"><a href="">Purchase</a></div>
			</div>
		</div>

	</div>

	<h2>Popular Tags</h2>
	<div id="popularTags">
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Street</a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Landscape</a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Portrait</a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Wildlife</a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Photojournalism</a></div>
		<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Sport</a></div>
	</div>



    <!-- Logged In -->

    <div id="profileInformation">

    </div>


<?php $content = ob_get_clean();?>
<?php require('template.php');?>
