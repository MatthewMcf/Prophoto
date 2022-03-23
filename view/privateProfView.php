<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/privateProfView.css">
    <script src="https://kit.fontawesome.com/86dc656e1f.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <section>
        <div id="profileHeader">
            <div id="profilePicWrapper">
                <!-- try background picture on container using style in div tag -->
                <div id="profilePic">
                    <img src="../data/default/profilePicture.png" alt="profilePic">
                    <!-- <div>test</div> -->
                </div>
            </div>
            <div id="profileInfo">
                <h4>camila@1234</h4>
                <h2>Camila Lee</h2>
                <p><strong>About Me:</strong> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas earum in commodi magni facilis! Soluta, perferendis ipsam possimus maiores fuga similique ducimus obcaecati laboriosam? Veniam consequatur harum repudiandae laboriosam deserunt. Fifteen More!!</p>
                <div id="socialMedia">
                    <a href="http://mywebsite.com" target="_blank"><i class="fa-solid fa-link"></i></a>
                    <a href="http://facebook.com" target="_blank"><i class="fa-brands fa-facebook-square"></i></a>
                    <a href="http://instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="http://linkedin.com" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                </div>
                <button id="editProfileInfo" class="btnHollow">Edit</button>
            </div>
        </div>
        <div>
            <div class="yourPhotos">
                <div class="sectionHeader">
                    <h3><i class="fa-solid fa-angle-down"></i> Your Photos</h3>
                </div>
                <div class="sectionPhotos">
                    <div class="cardContainer">
                        <div class="cardContent">
                            <button class="price">2 Credits</button>
                            <div>
                                <button class="editPic btnHollow">Edit</button>
                            </div>
                        </div>
                    </div>
                    <div class="cardContainer">
                        <div class="cardContent">
                            <button class="price">2 Credits</button>
                            <div>
                                <button class="editPic btnHollow">Edit</button>
                            </div>
                        </div>
                    </div>
                    <div class="cardContainer">
                        <div class="cardContent" id="addPicture">
                            <div>
                                <button class="btnHollow"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="yourPhotos liked">
                <div class="sectionHeader">
                    <h3><i class="fa-solid fa-angle-down"></i> Your Liked Photos</h3>
                </div>
                <div class="sectionPhotos">
                    <div class="cardContainer">
                        <div class="cardContent">
                            <button class="price">2 Credits</button>
                            <div class="likeContainer">
                                <div class="likeSelected">
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
                        <div class="cardContent">
                            <button class="price">2 Credits</button>
                            <div class="likeContainer">
                                <div class="likeSelected">
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
                        <div class="cardContent">
                            <button class="price">2 Credits</button>
                            <div class="likeContainer">
                                <div class="likeSelected">
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
                </div>
            </div>
            <div class="yourPhotos purchased">
                <div class="sectionHeader">
                    <h3><i class="fa-solid fa-angle-down"></i> Your Purchased Photos</h3>
                </div>
                <div class="sectionPhotos">
                    <div class="cardContainer">
                        <div class="cardContent">
                            <button class="price">2 Credits</button>
                            <div class="likeContainer">
                                <div class="likeSelected">
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
                        <div class="cardContent">
                            <button class="price">2 Credits</button>
                            <div class="likeContainer">
                                <div class="likeSelected">
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
                        <div class="cardContent">
                            <button class="price">2 Credits</button>
                            <div class="likeContainer">
                                <div class="likeSelected">
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
                </div>
            </div>
        </div>
    </section>
</body>
<script type="text/javascript" src="../public/js/script.js"></script>
<script type="text/javascript" src="../public/js/Modal.js"></script>

</html>