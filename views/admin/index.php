<?php
PageFrame::header();
PageFrame::loadBundle();
?>
<style>
    body {
    background-color: #f8f9fa;

    }
</style>
<link rel="stylesheet" href="/public/css/list.css">

<div class="container">
    <div class="col-md-12 article" >
        <h2>Ajouter un Spectacle</h2>
        <button onclick="window.location.href='add-show'" class="btn btn-primary green">Créer un spectable</button>
        </form>
        <br><br><hr><br>
        <h2>Modifier un Spectacle et <br>ses représentations</h2>
        <?php Components::adminList($data);
        ?>
    </div>
</div>

<?php
PageFrame::footer();
?>