<div class="layout">
    <?php
    PageFrame::loadBundle();
    PageFrame::header();
    ?>
    <link rel="stylesheet" href="/public/css/list.css">
    <link rel="stylesheet" href="/public/css/slider.css">

    <div class="listContainers">


        <div id="list">
            <div style="display: flex;justify-content: space-between;">
                <h1>
                    <?php echo count($data["listShow"]) . ' résulats trouvés ';
                    if (isset($_GET['search']) && $_GET["search"] != "") {
                        echo "pour \"" . $_GET['search'] . "\"";
                    } ?>
                </h1>

                <div style="display:flex;flex-direction:row">
                    <h4 style="width:200px">Trier par</h4>
                    <?php echo Components::showFilterOptions() ?>
                </div>
            </div>

            <table>
                <?php Components::showList($data["listShow"]); ?>
            </table>
        </div>

        <div id="filter">
            <div class="form-group">
                <h5 class="mb-1">Catégorie</h5>
                <div id="cat">
                    <?php echo Components::showMenuCategory() ?>
                </div>
            </div>

            <form class="form-group">
                <h5 class="mb-1">Prix</h5>
                <div class="values" style="display: flex;justify-content: space-between;">
                    <div><span id="first"></span>$</div>
                    <div><span id="second"></span>$</div>
                </div>
                <div class="slider" data-value-0="#first" data-value-1="#second" data-range="#third"></div>
                <br>
                <button type="submit" class="btn btn-small  btn-primary green">Appliquer</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="/public/js/slider.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".listingContainer").click(function() {
            let theOne = this;
            if ($(theOne).height() >= 112) {
                shrink($(theOne));
            } else {
                grow($(theOne));
            }
        });
    });

    function grow(target) {
        $(target).animate({
            height: "200px"
        }, 200);
        $(target).children().find("img").animate({
            height: "190px",
            width: "200px"
        }, 200, function() {
            $(target).find("#desc").removeClass("hide");
        });
        $(target).children().find(".expand").addClass("up");

    }

    function shrink(target) {
        $(target).find("#desc").addClass("hide");
        $(target).animate({
            height: "100px"
        }, 200);
        $(target).children().find("img").animate({
            height: "70px",
            width: "125px"
        }, 200);
        $(target).children().find(".expand").removeClass("up");
    }
</script>
<?php
PageFrame::footer();
PageFrame::loadSlider();

?>