<div class="layout">
    <?php
    PageFrame::loadBundle();
    PageFrame::header();
    $title = $data['title'];
    $artist = $data['artist'];
    //$venueName = $data['venueName'];
    $venueAddress = $data['location'];
    $categoryName = $data['location'];
    $date = explode(" ",$data['Date'])[0];
    $time = explode(" ",$data['Date'])[1];
    $description = $data['description'];
    ?>
    <link rel="stylesheet" href="/public/css/details.css">
    
    <script type="text/javascript">
        $( document ).ready(function() {
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
            });
        });
    </script>

    <div id="contentContainer">
        <div id="infoContainer">
            <div>
                <h4>Comédie / Yannick De Martino</h4>
                <img class="banner" src="/public/images/show/show1.jpg">
            </div>
            <div class="eventDetails">
                <h1>Les dalmatiens sont énormes en campagne</h1>
                <h2>17 Mai 2020 &bull; 17h00</h2>
                <h4>Yannick De Martino</h4>
                <h3><i class="smallIcon far fa-map"></i>Centre Bell</h3>
                <a class="aBuyButton" href="/public/show/details?id=<?php echo $_GET['id'] ?>"><div class="buyButton">Acheter Billets</div></a>
            </div>
        </div>
        <div id="extraContainer">
            <div id="extraNav">
                <div id="buttonContainer">
                    <div id="salleButton" class="selected">Détails de salle</div>
                    <div id="moreInfoButton" class="unselected">Informations</div>
                </div>
            </div>
            <div id="salleContainer">
                <h3>Centre Bell</h3>
                <h4>1909 Avn des Canadiens-de-Montréal, Montréal</h4>
                <h2>Carte de salle</h2>
                <img src="/public/images/sceneCentreBell.png">
            </div>
            <div id="moreInfoContainer" style="display:none;">
                <h3>More info...</h3>
            </div>
        </div>
    </div>
</div>

<?php
PageFrame::footer();
?>