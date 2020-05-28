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
      <?php echo isset($data["error"]) && $data["error"] ? '  <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Attention!</strong> Vous tentez de supprimez une salle avec des représentations. Veuillez supprimez toutes les représentations avant de supprimer la salle</div>': ''?>
        <div class="d-flex justify-content-between" style="padding:20px">
            <h2>Salles</h2>
            <button onclick="window.location.href='location'" class="btn btn-primary green">Ajouter une salle</button>
        </div>
        <?php locationList($data["locationList"]);?>
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
        $html .= '<tr>
                    <th>'.$name.'</td>
                    <th>'.$address.'</td>
                    <th
                    <div style="text-align:right; display:flex; justify-content:flex-end;align-items:center;">
                        <a href="'.$_SERVER["basePath"].'admin/location?id='.$id.'"><div class="next">Modifier</div></a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="loadInfo('.$id.',\''.$name.'\')">Supprimer</button>
                    </div>
                    </th>
                </tr>';
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
          Êtes-vous sûr de vouloir supprimer cette salle ?
        </div>
        <form action="" method="get">
        <input type="hidden" id="locationId" name="locationId"><br><br>
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
    document.getElementById("locationId").value = id;
    }</script>';
    echo $html;
}
?>