<div class="layout">
    <?php
    PageFrame::loadBundle();
    PageFrame::header();
    
    ?>
    <link rel="stylesheet" href="/public/css/details.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.css' rel='stylesheet' />
    
    <script src="https://unpkg.com/es6-promise@4.2.4/dist/es6-promise.auto.min.js"></script>
    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
    <script src="/public/js/eventInfo.js"></script>
    <script src="/public/js/map.js"></script>
    <div id="contentContainer">
        <div id="infoContainer">
            <div>
                <h4><?php echo $categoryName ?> / <?php echo $artist ?></h4>
                <img class="banner" src="/public/images/show/show<?php echo $data['idShow'] ?>.jpg">
            </div>
            <div class="eventDetails">
                <h1><?php echo $title ?></h1>
                <h2><?php echo $date." &bull; ".$time ?></h2>
                <h4><?php echo $artist ?></h4>
                <div>
                    <a class="aVenue" href="#moreInfoContainer"><h3><i class="smallIcon fas fa-map-marker-alt"></i><?php echo $venue ?></h3></a>
                </div>
                <a class="aBuyButton" href="#extraContainer"><div class="buyButton">Acheter Billets</div></a>
            </div>
        </div>
        <hr>
        <div id="descriptionContainer">
            <h3>Description</h3>
            <h4><?php echo $description ?></h2>
        </div>
    </div>
    <div id="extraContainer">
        <div id="extraNav">
            <div id="buttonContainer">
                <div id="salleButton" class="selected">Carte de salle</div>
                <div id="moreInfoButton" class="unselected">Information sur le lieu </div>
            </div>
        </div>
        <div id="salleContainer">
            <div>
                <h2></h2>
                <img id="sceneImg" src="/public/images/sceneCentreBell-0.png">
            </div>
            <div>
                <h3 class="ticketTitle">Choisir la section</h3>
                <div id="sectionBilletsContainer">
                    <a><div class="sectionBillet" id="section1" style="background-color: rgba(2, 108, 223,0.5)">Admission Générale</div></a>
                    <a><div class="sectionBillet" id="section2" style="background-color: rgba(223, 2, 108,0.5)">Section VIP</div></a>
                    <a><div class="sectionBillet" id="section3" style="background-color: rgba(108, 223, 2,0.5)">Section Plancher</div></a>
                </div>
                <p id="sectionError" style="color:red;display:none;">* Veuillez choisir la section</p>
                <h3 class="ticketTitle">Nombre de billets</h3>
                <div id="nbBilletsContainer">
                    <a><div>1</div></a>
                    <a><div>2</div></a>
                    <a><div>3</div></a>
                    <a><div>4</div></a>
                    <a><div id="5plus">5 +</div></a>
                </div>
                <div class="slidecontainer" style="display:none;">
                    <input type="range" min="5" max="15" value="5" class="slider" id="ticketRange">
                    <div id="demoDiv"><span id="demo"></span></div>
                </div>
                <p id="nbError" style="color:red;display:none;">* Veuillez choisir le nombre de billets</p>
                <script>
                    var slider = document.getElementById("ticketRange");
                    var output = document.getElementById("demo");
                    output.innerHTML = slider.value;

                    slider.oninput = function() {
                    output.innerHTML = this.value;
                    }
                </script>
                <div class="checkoutButton">Passer la commande</div>
            </div>
        </div>
        <div id="moreInfoContainer" style="visibility:hidden;position: absolute;top:-10000">
            <div>
                <div id="mapContainer">
                    <div style="margin-top:30px;">
                        <h3>Centre Bell</h3>
                        <h4>1909 Avn des Canadiens-de-Montréal, Montréal</h4>
                    </div>
                    <div id='map'></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
PageFrame::footer();
?>