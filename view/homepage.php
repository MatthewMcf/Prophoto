<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<?php ob_start(); ?>
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
                        <input type="text" name="search" onblur="ridDiv()" autocomplete="off" id="inputSearch" placeholder="Search photos..." />
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
        <h2>Find your new favourite photo today</h2>
        <div id="popularImages">
            <?php foreach ($homePageCardInfos as $card) {
                require('homePageCardView.php');
            }
            ?>
        </div>
        <div class="showMore">
            <a href="index.php?action=homepage&cardLimit=<?php echo (isset($_REQUEST["cardLimit"]) ? intval($_REQUEST["cardLimit"]) + 9 : 18) ?>"><button class="btnHollow">Show more photos</button></a>
        </div>
    </div>
</div>
</div>


<div class="container">
    <div id="mostPopular">
        <h2>Most Popular Tags</h2>
        <div id="popularTags">
            <div class="mostPopularImage"><a href="index.php?action=searchpage&search=seoul"><img src="public/images/seoul.jpeg" alt="seoul"></a> <a href="#">Seoul</a></div>
            <div class="mostPopularImage"><a href="index.php?action=searchpage&search=cats"><img src="public/images/cat.jpg" alt="cats"></a> <a href="#">Cats</a></div>
            <div class="mostPopularImage"><a href="index.php?action=searchpage&search=trees"><img src="public/images/tree-g3545204dd_1280.jpg" alt="trees"></a> <a href="#">Trees</a></div>
            <div class="mostPopularImage"><a href="index.php?action=searchpage&search=monkeys"><img src="public/images/monkey.jpg" alt="monkey"></a> <a href="#">Monkeys</a></div>
            <div class="mostPopularImage"><a href="index.php?action=searchpage&search=sunsets"><img src="public/images/sunset.jpg" alt="sunset"></a> <a href="#">Sunsets</a></div>
            <div class="mostPopularImage"><a href="index.php?action=searchpage&search=baby"><img src="public/images/baby.jpg" alt="baby"></a> <a href="#">Baby</a></div>
        </div>
    </div>
</div>
<div class="blueBackground">
    <div class="container">
        <div id="aboutProPhoto">
            <div id="aboutUs">
                <h2>About ProPhoto</h2>
                <p>ProPhoto is a photograph purchasing and selling site.</p>
                <p>By purchasing photos you are supporting photographers around the world and allow them to produce amazing photographs. When purchasing a photograph, you gain full rights to use it however you see fit.</p>
                <p>Selling your photos through ProPhoto allows to reach a large audience and sell your photographs around the world. It’s a great way to receive an income from something that you love to do.</p>
            </div>
            <div class="aboutUsImage"></div>
        </div>
    </div>
</div>

<script type="text/javascript" src="public/js/searchTags.js"></script>




<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>