<?php
PageFrame::header();
PageFrame::loadBundle();
?>
<link rel="stylesheet" href="<?php echo $_SERVER['basePath'] ?>public/css/admin.css">
<body data-gr-c-s-loaded="true">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<div class="container">
    <div class="col-md-12 article">
        <a style="color:21c87a" href="./locationlist">Retour au menu</a>
        <br>
        <h2><?php echo $data["pageState"] ?> un Spectacle</h2>

        <form id="form" class="row" method="POST" action="" enctype="multipart/form-data">
            <?php echo isset($_GET["id"]) && $_GET["id"] != '' ? "<input type='hidden' name='id' value=" . $_GET["id"] . ">" : "" ?>
            <div class="col-12 form-group">
                <label class="mb-1">Titre</label>
                <input name="title" type="text" class="form-control custominput" value='<?php echo $data["name"] ?>'>
            </div>

            <div class="col-12 form-group">
                <label class="mb-1">Adresse</label>
                <input name="address" type="text" class="form-control custominput" value='<?php echo $data["address"] ?>'>
            </div>
            <div class="col-12 form-group">
            <?php echo Components::SectionList($data["sections"]) ?>
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
</body>