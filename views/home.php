<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="favicon.ico" />
    <title>Billet Partout | Acceuil</title>
    <script src="https://kit.fontawesome.com/c681f65641.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/homePage.css">
    <link rel="stylesheet" href="public/css/MasterStyle.css">
</head>

<body>
    <script type="text/javascript">
        window.onscroll = function() {
            let headerElement = $('header');
            let height = headerElement.height();
            if (document.body.scrollTop > height || document.documentElement.scrollTop > height) {
                console.log(true);
            } else {
                console.log(false);
            }
        }
    </script>
    <header>
    <nav>
        <div class="navLeft">

        </div>
        <div class="navRight" style="text-align: right">
            <a href="/login"><i class="profileIcon fas fa-user"></i></a>
        </div>
    </nav>
    <div id="searchContainer">
        <img src="/public/images/logo_white.png" height="80px" width="466px">
        <!-- <h1>Billet Partout</h1> -->
        <div class="searchBar">
            <div style="width:34px; height:10px; display:inline-block"></div>
            <input type="text">
            <a href="/show/list"><i class="search fas fa-search"></i></a>
        </div>
        <div id="filterButtonContainer">
            <button class="filterButton"><i class="smallIcon fas fa-map-marker-alt"></i><span>Salle</span></button>
            <button class="filterButton"><i class="smallIcon fas fa-calendar-day"></i><span>Date</span></button>
            <button class="filterButton"><i class="smallIcon fas fa-theater-masks"></i><span>Type</span></button>
            <button class="filterButton"><i class="smallIcon fas fa-dollar-sign"></i><span>Prix</span></button>
        </div>
    </div>
    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2003.59 174">
        <path d="M1.5,562.5s837.17,286,2003.59,0c0,222-9.59,131-9.59,131l7,43H1.5Z" transform="translate(-1.5 -562.5)" fill="#fff" /></svg>
</header>
<div id="contentContainer">
    <section id="featuredSection">
        <h2 style="color:#333">En Vedette</h2>
        <section>
            <a href="">
                <img style="cursor: pointer" width="100%" src="/public/images/show/sample1.jpg">
            </a>
            <div style="display: inline-block; text-align: left; width: 50%; padding-left:15px;">
                <h2>Yannick de Martino</h2>
                <h3>Comédie</h3>
            </div>
            <div style="display: inline-flex; justify-content: center; align-items: center; width: 40%;">
                <button style="position: relative; bottom:15px;" onclick="window.location.href=''">Voir Billets</button>
            </div>
        </section>
        <h2 style="color:#333">Les Plus Vendus</h2>
        <div id="extraFeatured">
            <section>
                <a href="">
                    <img style="cursor: pointer" width="100%" height="60%" src="public/images/show/sample2.jpg">
                </a>
                <div style="display: inline-block; text-align: left; width: 50%; padding-left:15px;">
                    <h2>Calgary Stampeders</h2>
                    <h3>Sports</h3>
                </div>
            </section>
            <section>
                <a href="">
                    <img style="cursor: pointer" width="100%" height="60%" src="/public/images/show/sample3.jpg">
                </a>
                <div style="display: inline-block; text-align: left; width: 50%; padding-left:15px;">
                    <h2>The Weeknd</h2>
                    <h3>Musique</h3>
                </div>
            </section>
            <section>
                <a href="">
                    <img style="cursor: pointer" width="100%" height="60%" src="/public/images/show/sample4.jpg">
                </a>
                <div style="display: inline-block; text-align: left; width: 50%; padding-left:15px;">
                    <h2>Justin Bieber</h2>
                    <h3>Musique</h3>
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