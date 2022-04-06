<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php ob_start();?>
    <!-- <img src="https://lh3.googleusercontent.com/a-/AOh14GjbJt2y7iNsyG6OK-MbnB3p3zrsZ-V3dD6aGXNor1k=s96-c" alt=""> -->
    <script src="public/js/Modal.js" defer></script>
    <script src="public/js/homepage.js" defer></script>
    <script src="public/js/dropdown.js" defer></script>

    <link rel="stylesheet" href="public/css/searchBar.css">
    <link rel="stylesheet" href="public/css/homePage.css">


<div id="topContainer">
    <h1>
        One library, millions of ways to tell your story.
    </h1>
    <h3>
        Purchase from a selection of over 4000 high quality photos
    </h3>

    <!-- <div class="searchBar">
            <div class="searchContainer"> -->
    <!-- <div class="dropdownContainer">
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
                    <div id="results"></div>

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
        </div>-->

    <div class="search-container-search">
        <form id="autoComplete" class="photoSearch" action="index.php?action=searchpage" method="post">
            <div class="custom-select-search">
                <select>
                    <option value="0">Photo</option>
                    <option value="1">Photo</option>
                    <option value="2">Photographer</option>
                </select>
            </div>
            <div class="searchBar">
                <div class="searchBar" id="searchForm">
                    <div class="inputContainerSearch">
                        <input type="text" name="search" autocomplete="off" id="inputSearch" placeholder="Search photos..." />
                    </div>
                    <div id="results"></div>
                </div>
            </div>
            <button class="searchBtn">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
    </div>
</div>

    <div class="greyBackground">
        <div class="container popularImages">
	        <h2>Heading about the basic images</h2>
            <div id="popularImages">
                <?php foreach($homePageCardInfos as $card){
                    require('homePageCardView.php');
                }
                ?>
            </div>
            <div class="showMore">
                <a href="index.php?action=homepage&cardLimit=<?php echo (isset($_REQUEST["cardLimit"]) ? intval($_REQUEST["cardLimit"]) + 9 : 18) ?>" ><button class="btnHollow">Show more photos</button></a>
            </div>
        </div>
    </div>
</div>


<div class="container">

    <div id="aboutProPhoto">
        <div id="aboutUs">
            <h2>About proPhoto</h2>
            <p>
                Apparently we had reached a great height in the atmosphere, for the sky was a dead black, and the stars had ceased to twinkle. By the same illusion which lifts the horizon of the sea to the level of the spectator on a hillside, the sable cloud beneath was dished out, and the car seemed to float in the middle of an immense dark sphere,
            </p>

        </div>

        <div id="mostPopular">
            <h2>Most Popular Tags</h2>
            <div id="popularTags">
                <div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Street</a></div>
                <div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Landscape</a></div>
                <div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Portrait</a></div>
                <div class="placeholder"><a href="#"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Wildlife</a></div>
            </div>
        </div>


    </div>
</div>

<script type="text/javascript" src="public/js/searchTags.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>