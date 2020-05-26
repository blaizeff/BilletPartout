<?php
PageFrame::header();
PageFrame::loadBundle();
?>
<style>
    body {
        background-color: #f8f9fa;
    }
</style>
<link rel="stylesheet" href="/public/css/admin.css">

<div class="container">
    <div class="left-nav">
    <div>
        <h4>GESTION</h4>
    </div>
        <a href="/admin/spectacles">
            <div class="nav-link selectedNav">
                <i class="fas fa-theater-masks"></i> 
                &nbsp; Spectacles
                <i class="fas fa-angle-right"></i>
            </div>
        </a>
        <a href="/admin/salles">
            <div class="nav-link">
                <i class="fas fa-map-marked"></i> 
                &nbsp; Salles
                <i class="fas fa-angle-right"></i>
            </div>
        </a>
        <div>
            <h4>CLIENTS</h4>
        </div>
        <a href="/admin/infoClients">
            <div class="nav-link">
                <i class="fas fa-id-card"></i> 
                &nbsp; Informations clients
                <i class="fas fa-angle-right"></i>
            </div>
        </a>
        <a href="/admin/fidelite">
            <div class="nav-link">
                <i class="fas fa-star"></i> 
                &nbsp; Fidelité
                <i class="fas fa-angle-right"></i>
            </div>
        </a>
    </div>
    <div class="section">
        <div class="d-flex justify-content-between" style="padding:20px">
            <h3>Spectacles</h3>
            <button onclick="window.location.href='show'" class="btn btn-primary green">Ajouter un spectable</button>
        </div>

        <?php showList($data["showList"]);
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
?>