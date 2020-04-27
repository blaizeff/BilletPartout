<?php
PageFrame::header();
PageFrame::loadBundle();
?>
<style>
    body {
        background-color: #f8f9fa;

    }
</style>

<div class="container">
    <div class="col-md-12 article">
    <a style="color:21c87a" href="./details?id=<?php echo $_GET["idShow"]?>">Retour</a>
        <br>
        <h2>Ajouter une Représentation</h2>

        <form id="form" class="row" method="POST" action="" enctype="multipart/form-data">
            <div class="col-12 form-group">
                <label class="mb-1">Date</label>
                <input name="title" type="text" class="form-control custominput">
            </div>

            <div class="col-12 form-group">
                <label class="mb-1">Adresse</label>
                <input name="artist" type="text" class="form-control custominput">
            </div>

            <div class="col-md-6 mb-3 form-group">
                <label class="mb-1">Salle</label>
                <?php echo Show::showCategory() ?>
            </div>

            <div class="col-md-6 mb-3 form-group">
                <label class="mb-1">Adresse</label>
                <input name="artist" type="text" class="form-control custominput">
            </div>

            <div class="col-12 ">
                <button type="submit" class="btn btn-primary green">Ajouter</button>
            </div>
        </form>
    </div>
</div>

<?php
PageFrame::footer();
?>
