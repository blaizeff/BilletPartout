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
            <div class="nav-link selectedNav">
                <i class="fas fa-star"></i> 
                &nbsp; Fidelité
                <i class="fas fa-angle-right"></i>
            </div>
        </a>
    </div>
    <div class="section">
        <div class="d-flex justify-content-between" style="padding:20px">
            <h2>Fidelité</h2>
        </div>

    </div>
</div>

<?php
PageFrame::footer();
?>