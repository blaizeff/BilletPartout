<div class="layout">
    <?php
    PageFrame::loadBundle();
    PageFrame::header();

    $testArray = [
        array("showId"=>"1","showName"=>"Les Dalmatiens sont énormes en campagne", "showDesc"=>"Si le spectacle était une chanson le refrain serait rassembleur et léger avec des couplets déroutants et complexes… Assumant que les questions sont éternelles et les réponses temporaires, Yannick décide de ne jamais faire la morale ou de proposer de conclusions catégoriques, mais plutôt de questionner tout, absolument TOUT. Parce que rien n’a un sens au-delà des apparences et c’est exactement ce qui fait que TOUT peut devenir fascinant.", "showArtist"=>"Yannick De Martino", "showLocation"=>"Centre Bell", "showDate"=>"18 MAI", "showTime"=>"20h00"),
        array("showId"=>"2","showName"=>"Stampeders VS Roughriders", "showDesc"=>"Un match comme jamais auparavant! Deux très bonnes équipes qui font face... Qui sera le grand gagnant?", "showArtist"=>"Calgary Stampeders", "showLocation"=>"Centre Bell", "showDate"=>"1 MAI", "showTime"=>"12h00"),
        array("showId"=>"3","showName"=>"The Weeknd avec Invités", "showDesc"=>"Un show de The Weeknd qui, cette fois, est avec Sabrina Claudio et Don Toliver.", "showArtist"=>"The Weeknd", "showLocation"=>"Centre Bell", "showDate"=>"2 JUILLET", "showTime"=>"19h00")
    ];

    $search = $_GET['search'];
    ?>
    <link rel="stylesheet" href="/public/css/list.css">
    <script type="text/javascript">
        $( document ).ready(function() {
            $( "tr" ).click(function() {
                let theOne = this;
                if($(theOne).height() >= 112 ){
                    shrink($(theOne));
                }
                else{
                    grow($(theOne));
                }
            });
        });
        function grow(target){
            $(target).animate({height: "200px"}, 200);
            $(target).children().find("img").animate({height: "190px",width: "200px"}, 200, function() {$(target).find("#desc").removeClass("hide");});
            $(target).children().find(".expand").addClass("up");
            
        }
        function shrink(target){
            $(target).find("#desc").addClass("hide");
            $(target).animate({height: "80px"}, 200);
            $(target).children().find("img").animate({height: "70px",width: "125px"}, 200);
            $(target).children().find(".expand").removeClass("up");
        }
    </script>
    <div id="contentContainer">
        <h1>3 résulats trouvés pour "<?php echo $search ?>"</h1>
        <table>
            <?php
                foreach($testArray as $value){
                    $showId = $value['showId'];
                    $showName = $value['showName'];
                    $showArtist = $value['showArtist'];
                    $showLocation = $value['showLocation'];
                    $showDate = $value['showDate'];
                    $showTime = $value['showTime'];
                    $showDesc = $value['showDesc'];
                    echo "<tr>
                        <td>
                            <div class=\"listingContainer\">
                                <div style=\"display:grid; grid-template-columns:1fr 1fr;\">
                                    <img class=\"showImage\" src=\"/public/images/show/sample$showId.jpg\">
                                    <div style=\"margin-left:15px\">
                                        <h2>$showDate</h2>
                                        <h3>$showTime</h3>
                                    </div>
                                </div>
                                <div style=\"display:grid; grid-template-columns:3fr 1fr;\">
                                    <div style=\"position:relative;\">
                                        <h2>$showName</h2>
                                        <h3>$showArtist &bull; $showLocation</h3>
                                        <div id=\"desc\" class=\"hide\"><h4>$showDesc</h4></div>
                                        <i class=\"expand fas fa-chevron-down\"></i>
                                    </div>
                                    <div style=\"text-align:right; display:flex; justify-content:flex-end;align-items:center;\">
                                        <a href=\"/show/event-info?id=$showId\"><div class=\"next\">Voir Billets</div></a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    ";
                }
            ?>
        </table>
    </div>
</div>
<?php
PageFrame::footer();
?>