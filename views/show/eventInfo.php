<div class="layout">
    <?php
    PageFrame::loadBundle();
    PageFrame::header();
    $title = $data['title'];
    $artist = $data['artist'];
    //$venueName = $data['venueName'];
    $venueAddress = $data['venueLocation'];
    $venue = $data['venueName'];
    $categoryName = "Categorie";
    $months = [
        0 => "Janvier",
        1 => "Février",
        2 => "Mars",
        3 => "Avril",
        4 => "Mai",
        5 => "Juin",
        6 => "Juillet",
        7 => "Août",
        8 => "Septembre",
        9 => "Octobre",
        10 => "Novembre",
        11 => "Décembre"
    ];
    $dateRaw = explode("-",explode(" ",$data['Date'])[0]);
    $date = $dateRaw[2]." ".$months[intval($dateRaw[1])]." ".$dateRaw[0];
    $timeArray = explode(":",explode(" ",$data['Date'])[1]);
    $time = $timeArray[0]."h".$timeArray[1];
    $description = $data['description'];
    ?>
    <link rel="stylesheet" href="/public/css/details.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.10.0/mapbox-gl.css' rel='stylesheet' />
    
    <script src="https://unpkg.com/es6-promise@4.2.4/dist/es6-promise.auto.min.js"></script>
    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(".checkoutButton").click(function(){
                validate();
            });
            function validate(){
                let nbTickets = null;
                let sectionId = null;
                $("#nbBilletsContainer div").each(function(){
                    if($(this).hasClass("selectedNb")){
                        if($(this).is("#5plus")){
                            nbTickets = $("#demo").text();
                        }
                        else{
                            nbTickets = $(this).text();
                        }
                    }
                });
                $(".sectionBillet").each(function(){
                    if($(this).hasClass("selectedSection")){
                        sectionId = $(this).attr("id").replace(/[a-z]/g,"");
                    }
                });
                if(nbTickets === null){
                    $("#nbError").show();
                }
                if(sectionId === null){
                    $("#sectionError").show();
                }
                if(nbTickets !== null && sectionId !== null){
                    postForm(nbTickets,sectionId);
                }
            }
            function postForm(nbTickets, sectionId){
                var form = document.createElement("form");
                var element1 = document.createElement("input"); 
                var element2 = document.createElement("input");  

                form.method = "POST";
                form.action = "";   

                element1.value=nbTickets;
                element1.name="nbTickets";
                form.appendChild(element1);  

                element2.value=sectionId;
                element2.name="sectionId";
                form.appendChild(element2);

                document.body.appendChild(form);

                form.submit();
            }
            $("#buttonContainer>div").click(function(){
                if($(this).is("#salleButton")){
                    showCarte();
                }
                else{
                    showInfo();
                }
            });
            function showCarte(){
                $(".selected").addClass("unselected").removeClass("selected");
                $("#salleButton").addClass("selected").removeClass("unselected");
                $("#salleContainer").show();
                $("#moreInfoContainer").hide();
                $("html, body").animate({ scrollTop: $(document).height()-$(window).height()-100 }, 500);
            }
            function showInfo(){
                $(".selected").addClass("unselected").removeClass("selected");
                $("#moreInfoButton").addClass("selected").removeClass("unselected");
                $("#salleContainer").hide();
                $("#moreInfoContainer").show();
                $("#moreInfoContainer").css("visibility","inherit");
                $("#moreInfoContainer").css("position","relative");
                $("#moreInfoContainer").css("top","0");
                $("html, body").animate({ scrollTop: $(document).height()-$(window).height()-100 }, 500);
            }
            $("#sectionBilletsContainer a").click(function() {
                $("#sectionError").hide();
                $(".selectedSection").each(function() { $
                    let thisColor = $(this).css("background-color") ;
                    thisColor = thisColor.replace(/rgb/, "rgba");
                    thisColor = thisColor.replace(/\)/g, ",0.5)");
                    $(this).css("background-color",thisColor);
                });
                $(".selectedSection").removeClass("selectedSection");
                let section = $(this).find("div")
                $(section).addClass("selectedSection");
                let color = $(section).css("background-color").slice(0,-4)+"1)";
                $(section).css("background-color",color);
                if($(section).is("#section1")){
                    let src = $("#sceneImg").attr("src");
                    src = src.replace(/-[0-9]/,"-1");
                    $("#sceneImg").attr("src",src);
                }
                else if($(section).is("#section2")){
                    let src = $("#sceneImg").attr("src");
                    src = src.replace(/-[0-9]/,"-2");
                    $("#sceneImg").attr("src",src);
                }
                else if($(section).is("#section3")){
                    let src = $("#sceneImg").attr("src");
                    src = src.replace(/-[0-9]/,"-3");
                    $("#sceneImg").attr("src",src);
                }
            });
            $("#nbBilletsContainer div").click(function(){
                $("#nbError").hide();
                $("#nbBilletsContainer div").removeClass("selectedNb");
                $(this).addClass("selectedNb");
                console.log(this);
                if($(this).is("#5plus")){
                    $(".slidecontainer").show();
                } else{
                    $(".slidecontainer").hide();
                }
            })
            $( "a.aBuyButton" ).click(function( event ) {
                event.preventDefault();
                showCarte();
                $("html, body").animate({ scrollTop: $(document).height()-$(window).height()-100 }, 500);
            });
            $( "a.aVenue" ).click(function( event ) {
                event.preventDefault();
                showInfo();
                $("html, body").animate({ scrollTop: $(document).height()-$(window).height()-100 }, 500);
            });
        });
    </script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiYmxhaXplZmYiLCJhIjoiY2s5bTYwZmlwMmRndzNmbzFpcjJoczlwMiJ9.cogH7m0a7U4jCtT7aH8WHg';
        var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
        mapboxClient.geocoding
            .forwardGeocode({
                query: "<?php echo $venueAddress ?>",
                autocomplete: false,
                limit: 1
            })
            .send()
            .then(function(response) {
                if (
                    response &&
                    response.body &&
                    response.body.features &&
                    response.body.features.length
                ) {
                    var feature = response.body.features[0];

                    var map = new mapboxgl.Map({
                        container: 'map',
                        style: 'mapbox://styles/mapbox/streets-v11',
                        center: feature.center,
                        zoom: 10
                    });
                    //map.on('load', () => {
                    //    map.resize();
                    //});  
                    new mapboxgl.Marker().setLngLat(feature.center).addTo(map);
                }
            });
    </script>
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