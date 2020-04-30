<div class="layout">
    <?php
    PageFrame::loadBundle();
    PageFrame::header();
    $title = $data['title'];
    $artist = $data['artist'];
    //$venueName = $data['venueName'];
    $venueAddress = $data['location'];
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
    
    <script type="text/javascript">
        $( document ).ready(function() {
            /*
            $("#buttonContainer>div").click(function(){
                if($(this).hasClass("unselected")){
                    $(".selected").addClass("unselected").removeClass("selected");
                    $(this).addClass("selected").removeClass("unselected");
                }
                if($("#salleButton").hasClass("selected")){
                    $("#salleContainer").show();
                    $("#moreInfoContainer").hide();
                } else {
                    $("#salleContainer").hide();
                    $("#moreInfoContainer").show();
                }
            }); */
            $("#sectionBilletsContainer a").click(function() {
                $("#sectionBilletsContainer .sectionBillet").removeClass("selectedSection");
                $(this).children().find("div").addClass("selectedSection");
            });

            $( "a.aBuyButton" ).click(function( event ) {
                event.preventDefault();
                $("html, body").animate({ scrollTop: $($(this).attr("href")).offset().top }, 500);
            });
        });
    </script>

    <div id="contentContainer">
        <div id="infoContainer">
            <div>
                <h4><?php echo $categoryName ?> / <?php echo $artist ?></h4>
                <img class="banner" src="/public/images/show/show1.jpg">
            </div>
            <div class="eventDetails">
                <h1><?php echo $title ?></h1>
                <h2><?php echo $date." &bull; ".$time ?></h2>
                <h4><?php echo $artist ?></h4>
                <h3><i class="smallIcon fas fa-map-marker-alt"></i>Centre Bell</h3>
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
                <img src="/public/images/sceneCentreBell.png">
            </div>
            <div>
                <h3 class="ticketTitle">Nombre de billets</h3>
                <div id="nbBilletsContainer">
                    <a><div>1</div></a>
                    <a><div>2</div></a>
                    <a><div>3</div></a>
                    <a><div>4</div></a>
                    <a><div>5 +</div></a>
                </div>
                <h3 class="ticketTitle">Section</h3>
                <div id="sectionBilletsContainer">
                    <a><div class="sectionBillet" id="section1">Admission Générale</div></a>
                    <a><div class="sectionBillet" id="section2">Section VIP</div></a>
                    <a><div class="sectionBillet" id="section3">Section Plancher</div></a>
                </div>
            </div>
        </div>
        <div id="moreInfoContainer">
            <h3>Centre Bell</h3>
            <h4>1909 Avn des Canadiens-de-Montréal, Montréal</h4>
        </div>
    </div>
</div>

<?php
PageFrame::footer();
?>