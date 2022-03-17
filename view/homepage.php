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

	<div id="popular-tags">
	
	</div>

    <!-- Logged In -->

    <div id="profile-information">

    </div>


<?php $content = ob_get_clean();?>
<?php require('template.php');?>
