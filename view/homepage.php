<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php ob_start(); ?>
<!-- <img src="https://lh3.googleusercontent.com/a-/AOh14GjbJt2y7iNsyG6OK-MbnB3p3zrsZ-V3dD6aGXNor1k=s96-c" alt=""> -->
<script src="public/js/Modal.js" defer></script>
<script src="public/js/homepage.js" defer></script>

<div id="topContainer">
    <h2 id="callToAction">
        Placeholder Call-To-Action.
    </h2>
    <h3 id="callToActionSecondary">
        Secondary Call-To-Action text.
    </h3>

    <div class="search-container-search">
        <form onsubmit="return false;" id="autoComplete" action="homepage.php" method="get">
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
                        <input type="text" id="inputSearch" autocomplete="off" placeholder="Search photos..." />
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


<h2>Heading about the basic images</h2>
<div id="popularImages">
    <?php foreach ($homePageCardInfos as $card) {
        require('homePageCardView.php');
    }
    ?>
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

<div id="profileInformation"></div>
<script type="text/javascript" src="public/js/searchTags.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>