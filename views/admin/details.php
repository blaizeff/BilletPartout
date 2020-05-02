<?php
PageFrame::header();
PageFrame::loadBundle();
?>
<link rel="stylesheet" href="<?php echo $_SERVER['basePath']?>public/css/admin.css">
<div class="container">
    <div class="section">
        <div style="padding:20px">
            <a style="color:21c87a" href="./.">Retour au menu</a>
            <h2>Spectacle</h2>
        </div>
        <?php listShow($data); ?>
        <div class="d-flex justify-content-between" style="padding:20px">
            <h2>Représentations</h2>
            <button onclick="window.location.href='event?idShow=<?php echo $data['IdShow']; ?>'" class="btn btn-primary green">Rajouter une Représentation</button>
        </div>
    </div>
</div>

<?php
PageFrame::footer();
function listShow($data)
{
    $html = "<table class='table table-borderless' >";
    $IdShow = $data["idShow"];
    $Name = $data['title'];
    $Artist = $data['artist'];
    $category = $data["idCat"];
    $html .= "<tr>
                    <th class='listingContainer'>
                        <img class='showImage' src='".$_SERVER['basePath']."public/images/show/show$IdShow.jpg'>
                    </th>
                    <th>$Name</td>
                    <th>$category</td>
                    <th>$Artist</td>
                    <th
                    <div style=\"text-align:right; display:flex; justify-content:flex-end;align-items:center;\">
                        <a href=\"show?id=$IdShow\"><div class=\"next\">Modifier</div></a>
                    </div>
                    </th>
                </tr>";
    $html .= "</table>";
    echo $html;
}
?>