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
        <h2>Search results for :</h2>
        <div id="popularImages">
            <?php
            if ($homePageCardInfos) {
                foreach ($homePageCardInfos as $card) {
                    require('searchCardView.php');
                }
            } else {
                echo "No results found";
            }
            ?>
        </div>
        <div class="showMore">
            <button class="btnHollow">Show more photos</button>
        </div>
    </div>
</div>



<script type="text/javascript" src="public/js/searchTags.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>