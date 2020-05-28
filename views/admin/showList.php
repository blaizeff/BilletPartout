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

<div class="listcontainer">
    <?php PageFrame::AdminNav();?>
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
                        <a href=\"".$_SERVER["basePath"]."admin/show?id=".$IdShow."\"><div class=\"next\">Modifier</div></a>
                        <button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#exampleModal\" onclick=\"loadInfo($IdShow,'$Name')\">Supprimer</button>
                    </div>
                    </th>
                </tr>";
    }
    $html .= "</table>";
    $html .='<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Êtes-vous sûr de vouloir supprimer ce spectacle ?
        </div>
        <form action="" method="get">
        <input type="hidden" id="showId" name="showId"><br><br>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
          <button type="submit" formmethod="post" class="btn btn-primary">Oui</button>
        </div>
      </div>
    </div>
  </div>';
    $html .= '<script> function loadInfo(pId,pName) {
      var id = pId;
      var name = pName;
      document.getElementById("ModalLabel").innerHTML = name;
      document.getElementById("showId").value = id;
      }</script>';
    echo $html;
}
?>