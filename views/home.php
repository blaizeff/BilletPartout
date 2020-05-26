<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="favicon.ico" />
    <title>Billet Partout | Acceuil</title>
    <script src="https://kit.fontawesome.com/c681f65641.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/MasterStyle.css">
    <link rel="stylesheet" href="public/css/homePage.css">
</head>

<div id=overlay style="display:none"></div>
<body>
    <script type="text/javascript">
        $(document).ready(function() {
            let overlayHidden = true;
            $('#salleDropdown').on("click", () => {
                if (!$('#sallePopup').hasClass('showFilter')){
                    $('.dropdown-content').removeClass('showFilter');
                    $('#sallePopup').addClass('showFilter');
                }
            });
            $('#dateDropdown').on("click", () => {
                if (!$('#datePopup').hasClass('showFilter')){
                    $('.dropdown-content').removeClass('showFilter');
                    $('#datePopup').addClass('showFilter');
                }
            });
            $('#categorieDropdown').on("click", () => {
                if (!$('#categoriePopup').hasClass('showFilter')){
                    $('.dropdown-content').removeClass('showFilter');
                    $('#categoriePopup').addClass('showFilter');
                }
            });
            $('#prixDropdown').on("click", () => {
                if (!$('#prixPopup').hasClass('showFilter')){
                    $('.dropdown-content').removeClass('showFilter');
                    $('#prixPopup').addClass('showFilter');
                }
            });

            $('#searchBox').on("click", () => {
                showOverlay();
            });
            $('#overlay').on("click", () => {
                if(!overlayHidden){
                    hideOverlay();
                }
            });
            $('.search').on("click", () => {
                $("#submit").click();
            });

            function showOverlay(){
                $("#overlay").show();   
                overlayHidden = false;
            }
            function hideOverlay(){
                $("#overlay").hide();
                $('.dropdown-content').removeClass('showFilter');
                overlayHidden = true;
            }
        });
    </script>
    <!--<img id="background" src="/public/images/bg.png">-->
    <div id="homeHeader">
        <nav>
            <div class="navLeft">

            </div>
            <div class="navRight" style="text-align: right">
            <?php if (UserAcess::isAdmin()) {
                echo '<a href="admin/"><i class="profileIcon fas fa-user"></i></a>';
            } else if (UserAcess::isUser()) {
                echo '<a href="profile/homepage"><i class="profileIcon fas fa-user"></i></a>';
            } else {
                echo '<a href="profile/login"><i class="profileIcon fas fa-user"></i></a>';
            }

            ?>
            </div>
        </nav>
        <div id="searchContainer">
            <img src="public/images/logo_white.png" height="80px" width="466px">
            <div id="searchBox">
                <form action="show/list">
                    <div class="searchBar">
                        <div style="width:34px; height:10px; display:inline-block"></div>
                        <input autocomplete="off" name="search" id="searchInput" type="text" placeholder="Nom de l'artiste, Nom du Groupe ou de l'évènement">
                        <i class="search fas fa-search"></i>
                        <button id="submit" type="submit"></button>
                    </div>
                </form>
                <div id="filterButtonContainer">
                    <div id="salleDropdown" class="dropdown">
                        <button id="salleFilterButton" class="filterButton"><i class="smallIcon fas fa-map"></i><span>Salle</span></button>
                        <div id="sallePopup" class="dropdown-content">
                            test
                        </div>
                    </div>
                    <div id="dateDropdown" class="dropdown">
                        <button id="dateFilterButton" class="filterButton"><i class="smallIcon fas fa-calendar-day"></i><span>Date</span></button>
                        <div id="datePopup" class="dropdown-content">
                            Date de début
                            <input type="date" name="startDate" class="custominput"  value="<?php echo isset($_GET['startDate']) ? $_GET['startDate'] :'';?>" style="width: 100%;border-radius:5px">
                            <br><br>
                            Date de fin
                            <input type="date" name="endDate" class="custominput" value="<?php echo isset($_GET['endDate']) ? $_GET['endDate'] :'';?>" style="width: 100%;border-radius:5px">
                        </div>
                    </div>
                    <div id="categorieDropdown" class="dropdown">
                        <button id="categorieFilterButton" class="filterButton"><i class="smallIcon fas fa-theater-masks"></i><span>Catégorie</span></button>
                        <div id="categoriePopup" class="dropdown-content">
                            test
                        </div>
                    </div>
                    <div id="prixDropdown" class="dropdown">
                        <button id="prixFilterButton" class="filterButton"><i class="smallIcon fas fa-dollar-sign"></i><span>Prix</span></button>
                        <div id="prixPopup" class="dropdown-content">
                            test
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2003.59 174">
            <path d="M1.5,562.5s837.17,286,2003.59,0c0,222-9.59,131-9.59,131l7,43H1.5Z" transform="translate(-1.5 -562.5)" fill="#fff" /></svg> -->
    </div>
    <div id="contentContainer">
        <section id="featuredSection">
            <h2 style="color:#333">En Vedette</h2>
            <section>
                <a href="show/list?search=<?php echo $enVedette['title'] ?>">
                    <img style="cursor: pointer" width="100%" src="public/images/show/show<?php echo $enVedette['idShow'] ?>.jpg">
                </a>
                <div style="display: inline-block; text-align: left; width: 50%; padding-left:15px;">
                    <h2><?php echo $enVedette['title'] ?></h2>
                    <h3><?php echo $enVedette['categorie'] ?></h3>
                </div>
                <div style="display: inline-flex; justify-content: center; align-items: center; width: 40%;">
                    <button style="position: relative; bottom:15px;" onclick="window.location.href='show/list?search=<?php echo $enVedette['title'] ?>'">Voir Billets</button>
                </div>
            </section>
            <h2 style="color:#333">Les Plus Vendus</h2>
            <div id="extraFeatured">
                <section>
                    <a href="show/list?search=<?php echo $plusVendus[0]['title'] ?>">
                        <img style="cursor: pointer" width="100%" height="60%" src="public/images/show/show<?php echo $plusVendus[0]['idShow'] ?>.jpg">
                    </a>
                    <div style="display: inline-block; text-align: left; width: 50%; padding-left:15px;">
                        <h2><?php echo $plusVendus[0]['title'] ?></h2>
                        <h3><?php echo $plusVendus[0]['categorie'] ?></h3>
                    </div>
                </section>
                <section>
                    <a href="show/list?search=<?php echo $plusVendus[1]['title'] ?>">
                        <img style="cursor: pointer" width="100%" height="60%" src="public/images/show/show<?php echo $plusVendus[1]['idShow'] ?>.jpg">
                    </a>
                    <div style="display: inline-block; text-align: left; width: 50%; padding-left:15px;">
                        <h2><?php echo $plusVendus[1]['title'] ?></h2>
                        <h3><?php echo $plusVendus[1]['categorie'] ?></h3>
                    </div>
                </section>
                <section>
                    <a href="show/list?search=<?php echo $plusVendus[2]['title'] ?>">
                        <img style="cursor: pointer" width="100%" height="60%" src="public/images/show/show<?php echo $plusVendus[2]['idShow'] ?>.jpg">
                    </a>
                    <div style="display: inline-block; text-align: left; width: 50%; padding-left:15px;">
                        <h2><?php echo $plusVendus[2]['title'] ?></h2>
                        <h3><?php echo $plusVendus[2]['categorie'] ?></h3>
                    </div>
                </section>
            </div>
        </section>
    </div>
    <?php
    PageFrame::footer()
    ?>
</body>

</html>