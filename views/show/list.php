<div class="layout">
    <?php
    PageFrame::loadBundle();
    PageFrame::header();
    ?>
    <link rel="stylesheet" href="/public/css/list.css">
    <link rel="stylesheet" href="/public/css/slider.css">

    <div class="listContainers">
        <form id="filter" class="form-group" action="./list" method="get">
            <input type="hidden" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <input type="hidden" name="category" value="<?php echo isset($_GET['category']) ? $_GET['category'] : ''; ?>">
            <textarea style="display:none;" type="hidden" class="first" name="minPrice"></textarea>
            <textarea style="display:none;" type="hidden" class="second" name="maxPrice"></textarea>
            <input type="hidden" name="order" value="<?php echo isset($_GET['order']) ? $_GET['order'] : ''; ?>">
            <div class="form-group">
                <h4 class="mb-1">Catégorie 
                    <?php 
                    if (isset($_GET["category"]) && $_GET["category"] != "") 
                    echo '<a style="font-size:18" href="list?'.Components::buildGetURL('category','')."\"><i style='color:#21c87a' class='far fa-times-circle'></i></a>"; ?>
                </h4>
                <div id="cat">
                    <?php echo Components::showMenuCategory() ?>
                </div>
            </div>
            <hr>
            <div>
                <h4 class="mb-1">Prix</h4>
                <div class="values" style="display: flex;justify-content: space-between;">
                    <div><span class="first"></span>$</div>
                    <div><span class="second"></span>$</div>
                </div>


                <div class="slider" data-value-0=".first" data-value-1=".second" data-range=".third"></div>
                <br>
            </div>
            <hr>
            <div>
                <h4>Date</h4>
                Date de début
                <input type="date" name="startDate" class="custominput" style="width: 100%;border-radius:5px">
                <br><br>
                Date de fin
                <input type="date" name="endDate" class="custominput" style="width: 100%;border-radius:5px">
            </div>
            <br>
            <hr>
            <button type="submit" class="btn btn-lg btn-block btn-primary green">Appliquer</button>

        </form>

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