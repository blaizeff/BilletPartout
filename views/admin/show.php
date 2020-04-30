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
    <div class="col-md-12 article">
        <a style="color:21c87a" href="<?php echo $data["returnLink"]; ?>">Retour au menu</a>
        <br>
        <h2><?php echo $data["pageState"] ?> un Spectacle</h2>

        <form id="form" class="row" method="POST" action="" enctype="multipart/form-data">
            <?php echo isset($_GET["id"]) && $_GET["id"] != '' ? "<input type='hidden' name='id' value=" . $_GET["id"] . ">" : "" ?>

            <div class="col-12 form-group">
                <label class="mb-1">Titre</label>
                <input name="title" type="text" class="form-control custominput" value='<?php echo $data["title"] ?>'>
            </div>

            <div class="col-12 form-group">
                <label class="mb-1">Description</label>
                <textarea name="description" type="text" class="form-control custominput" rows="4" cols="50"><?php echo $data["description"] ?></textarea>
            </div>

            <div class="col-12 form-group">
                <label class="mb-1">Nom de l'artiste ou du groupe</label>
                <input name="artist" type="text" class="form-control custominput" value='<?php echo $data["artist"] ?>'>
            </div>

            <div class="col-12 form-group">
                <label class="mb-1">Catégorie</label>
                <?php echo Show::showCategory('', $data['idCat']) ?>
            </div>

            <div class="col-12 form-group">
                <label class="mb-1">Affiche</label>
                <input name="image" id="image" type="file" class="form-control customselect " accept="image/png" onchange="readURL(this);">
                <img id="blah"  src="#" alt="" />
            </div>

            <div class="col-12 ">
                <button type="submit" class="btn btn-primary green"><?php echo $data["pageState"] ?></button>
            </div>
        </form>
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