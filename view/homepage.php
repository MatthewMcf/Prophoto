<?php
if(!isset($_SESSION)) { 
    session_start(); 
}
?>
<?php ob_start();?>
    <!-- <img src="https://lh3.googleusercontent.com/a-/AOh14GjbJt2y7iNsyG6OK-MbnB3p3zrsZ-V3dD6aGXNor1k=s96-c" alt=""> -->


	<div id="topContainer">
		<h2 id="callToAction">
			Placeholder Call-To-Action.
        </h2>
		<h3 id="callToActionSecondary">
			Secondary Call-To-Action text.
        </h3>
		
		<div class="searchBar">
            <div class="searchContainer">
                <div class="dropdownContainer">
                    <div class='dropdown'>
                        <div class='title pointerCursor'></i>Hot<i class="fa-solid fa-caret-down"></i></div>
                        
                        <div class='menu pointerCursor hide'>
                            <div class="dropdownResults">
                                <div class='option' id='option1'>Hot</div>
                                <div class='option' id='option2'>Tags</div>
                                <div class='option' id='option3'>Photographer</div>
                            </div>
                        </div>
                    </div>
                </div>


                <form class="form" id="form">
                    <div class="inputContainer">
                        <input
                            type="text"
                            class="input"
                            placeholder="Input example"
                        />
                    </div>
                </form>
			</div>
        </div>

    </div>


	<br>


	<h2>Heading about the basic images</h2>
	<div id="popularImages">
    <div class="cardContainer">
        <div class="cardContent photoCard" path="public/images/seoul.jpeg">
            <button class="price">2 Credits</button>
            <div class="likeContainer">
                <div class="likeUnselected">
                    <i class="fa-regular fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="cardInfo">
            <a href="">
            <div class="photographerInfo">
                <div class="photographerSmallProfilePic"></div>
                <h4>Username</h4>
            </div>
            </a>
            <div class="purchase">
                <button class="btnPrimary">purchase</button> 
            </div>
        </div>
    </div>

    <div class="cardContainer">
    <div class="cardContent photoCard" path="public/images/seoul.jpeg">
            <button class="price">2 Credits</button>
            <div class="likeContainer">
                <div class="likeUnselected">
                    <i class="fa-regular fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="cardInfo">
            <a href="">
            <div class="photographerInfo">
                <div class="photographerSmallProfilePic"></div>
                <h4>Username</h4>
            </div>
            </a>
            <div class="purchase">
                <button class="btnPrimary">purchase</button> 
            </div>
        </div>
    </div>

    <div class="cardContainer">
    <div class="cardContent photoCard" path="public/images/seoul.jpeg">
            <button class="price">2 Credits</button>
            <div class="likeContainer">
                <div class="likeUnselected">
                    <i class="fa-regular fa-heart"></i>
                </div>
            </div>
        </div>
        <div class="cardInfo">
            <a href="">
            <div class="photographerInfo">
                <div class="photographerSmallProfilePic"></div>
                <h4>Username</h4>
            </div>
            </a>
            <div class="purchase">
                <button class="btnPrimary">purchase</button> 
            </div>
        </div>
    </div>

	<div id="sectionTwo">
		<div id="aboutUs">
			<h2>About proPhoto</h2>
			<p>
				Apparently we had reached a great height in the atmosphere, for the sky was a dead black, and the stars had ceased to twinkle. By the same illusion which lifts the horizon of the sea to the level of the spectator on a hillside, the sable cloud beneath was dished out, and the car seemed to float in the middle of an immense dark sphere, 
			</p>

		</div>

		<div class="outerContainer">
			<h2>Most Popular Tags</h2>
			<div id="popularTags">
				<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Street</a></div>
				<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Landscape</a></div>
				<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Portrait</a></div>
				<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Wildlife</a></div>
				<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Photojournalism</a></div>
				<div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Sport</a></div>
			</div>
		</div>


	</div>





    <!-- Logged In -->

    <div id="profileInformation">

    </div>



<?php $content = ob_get_clean();?>
<?php require('template.php');?>
