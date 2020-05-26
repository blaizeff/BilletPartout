<?php
PageFrame::loadBundle();
PageFrame::header();
?>
        <div class="row align-items-center justify-content-center no-gutters ">
            <div class="col-12 col-md-5 col-lg-5 py-8 py-md-11 card" style="margin-top:240px;">
            <div style="padding:50px 30px 50px 30px">
                <h1 class="title">Bonjour <?php echo ($_SESSION['user']['nomClient'])?>,</h1>
                <h5>Votre numéro de confirmation est le : <?php echo rand(1, 1000000)?></h5>
                <br>
                <h6>Merci de la part de toute l'équipe de Billet Partout</h6>
            </div>
            </div>

        </div>
<?php
PageFrame::footer();
?>