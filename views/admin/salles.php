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
            <div class="nav-link">
                <i class="fas fa-theater-masks"></i> 
                &nbsp; Spectacles
                <i class="fas fa-angle-right"></i>
            </div>
        </a>
        <a href="/admin/salles">
            <div class="nav-link selectedNav">
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
            <h2>Salles</h2>
            <button onclick="window.location.href='location'" class="btn btn-primary green">Ajouter une salle</button>
        </div>
        <?php locationList($data["locationList"]);
        ?>

    </div>
</div>

<?php
PageFrame::footer();

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