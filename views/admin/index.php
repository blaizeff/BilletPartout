<?php
PageFrame::header();
PageFrame::loadBundle();
?>
<style>
    body {
        background-color: #f8f9fa;

    }
</style>
<link rel="stylesheet" href="<?php echo $_SERVER['basePath']?>public/css/admin.css">

<div class="container">
    <div class="section">
        <div class="d-flex justify-content-between" style="padding:20px">
            <h3>Spectacles</h3>
            <button onclick="window.location.href='show'" class="btn btn-primary green">Ajouter un spectable</button>
        </div>

        <?php showList($data["showList"]);
        ?>
        <br><br><br>
        <div class="d-flex justify-content-between" style="padding:20px">
            <h2>Salles</h2>
            <button onclick="window.location.href='location'" class="btn btn-primary green">Ajouter une salle</button>
        </div>
        <?php locationList($data["locationList"]);
        ?>

    </div>
</div>

<?php
PageFrame::footer();

 function showList($data)
{
    $html = "<table class='table table-borderless'>";
    $html .= "<thead class='black white-text'><tr>
                <th>Affiche</th>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Artiste</th>
                <th></th>
                </tr></thead>";
    foreach ($data as $value) {
        $IdShow = $value["idShow"];
        $Name = $value['title'];
        $Artist = $value['artist'];
        $category = $value["idCat"];
        $html .= "<tr>
                    <th class='listingContainer'>
                        <img class='showImage' src='".$_SERVER['basePath']."public/images/show/show$IdShow.jpg'>
                    </th>
                    <th>$Name</td>
                    <th>$category</td>
                    <th>$Artist</td>
                    <th
                    <div style=\"text-align:right; display:flex; justify-content:flex-end;align-items:center;\">
                        <a href=\"".$_SERVER['basePath']."admin/details?id=$IdShow\"><div class=\"next\">Détails</div></a>
                    </div>
                    </th>
                </tr>";
    }
    $html .= "</table>";
    echo $html;
}
function locationList($data)
{
    $html = "<table class='table table-borderless' style=margin-bottom:0>";
    $html .= "<thead class='black white-text'><tr>
                <th>Lieux</th>
                <th>Adresse</th>
                <th></th>
                </tr></thead>";
    foreach ($data as $value) {
        $id = $value["id"];
        $name = $value['name'];
        $address = $value["address"];
        $html .= "<tr>
                    <th>$name</td>
                    <th>$address</td>
                    <th
                    <div style=\"text-align:right; display:flex; justify-content:flex-end;align-items:center;\">
                        <a href=\"".$_SERVER['basePath']."admin/location?id=$id\"><div class=\"next\">Modifier</div></a>
                    </div>
                    </th>
                </tr>";
    }
    $html .= "</table>";
    echo $html;
}
?>