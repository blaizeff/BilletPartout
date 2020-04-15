
<div class="layout">
    <?php
    PageFrame::header();
    PageFrame::loadBundle();
    ?>
<link rel="stylesheet" href="/public/css/login.css">

    <div class="container">
        <div class="row align-items-center justify-content-center no-gutters ">
            <div class="col-12 col-md-5" style="padding-top:240px">

                <h1 class="title">Se connecter</h1>
                <input type="email" class="form-control form-control-lg" id="email" placeholder="Entrez votre courriel">
                <input type="password" class="form-control form-control-lg" id="password" placeholder="Entrez votre mot de passe">

                <div class="form-group d-flex justify-content-between">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" checked="">
                        <label class="custom-control-label" for="checkbox-remember">Se souvenir de moi</label>
                    </div>
                    <a href="#" style="color:#01bd1d">Réinitialiser le mot de passe</a>
                </div>

                <button class="btn btn-lg btn-block btn-primary green" onclick="window.location.href='profile/homepage';">Se connecter</button>

                <div class="text-center">
                    Première visite. <a  href="#" style="color:#01bd1d">Créer un compte</a>.
                </div>
            </div>

        </div>
    </div>

</div>
<?php
PageFrame::footer();
?>