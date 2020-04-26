<div class="layout">
    <?php
    PageFrame::loadBundle();
    PageFrame::header();
    ?>
    <link rel="stylesheet" href="/public/css/list.css">
    
    <div id="contentContainer">
        <h1><?php echo count($data["listShow"]);?> résulats trouvés <?php 
        if (isset($_GET['search']) && $_GET["search"] != "") {
            echo "pour \"".$_GET['search']."\"";
        }?></h1>
        <table>
            <?php
            Components::showList($data["listShow"]);
            ?>
        </table>
    </div>
</div>

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
<?php
PageFrame::footer();
?>