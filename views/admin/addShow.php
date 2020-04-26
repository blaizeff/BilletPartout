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
        <a style="color:21c87a" href="./.">Retour au menu</a>
        <br>
        <h2>Ajouter un Spectacle</h2>

        <form id="form" class="row" method="POST" action="" enctype="multipart/form-data">
            <div class="col-12 form-group">
                <label class="mb-1">Titre</label>
                <input name="title" type="text" class="form-control custominput">
            </div>

            <div class="col-12 form-group">
                <label class="mb-1">Description</label>
                <textarea  name="description" type="text" class="form-control custominput" rows="4" cols="50"></textarea>
            </div>

            <div class="col-12 form-group">
                <label class="mb-1">Nom de l'artiste ou du groupe</label>
                <input name="artist" type="text" class="form-control custominput">
            </div>

            <div class="col-12 form-group">
                <label class="mb-1">Catégorie</label>
                <?php echo Show::showCategory() ?>
            </div>

            <div class="col-12 form-group">
                <label class="mb-1">Affiche</label>
                <input name="image" id="image" type="file" class="form-control customselect " accept="image/png" onchange="readURL(this);">
                <img id="blah" class="showImage" src="#" alt="" />
            </div>

            <div class="col-12 ">
                <button type="submit" class="btn btn-primary green">Créer le spectable</button>
            </div>
        </form>

        <hr>

    </div>
</div>

<?php
PageFrame::footer();
?>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width("50%")
                    .height(auto);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>