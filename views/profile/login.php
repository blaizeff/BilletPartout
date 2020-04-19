
<div class="layout">
    <?php
    PageFrame::header();
    PageFrame::loadBundle();
    ?>
<link rel="stylesheet" href="/public/css/login.css">

    <form id="form" class="container" method="POST" action="">
        <div class="row align-items-center justify-content-center no-gutters ">
            <div class="col-12 col-md-5" style="padding-top:240px">

                <h1 class="title">Se connecter</h1>
                <div style="color:red;text-align:center">
                <?php if (isset($_SESSION['LoginInvalid']) && $_SESSION['LoginInvalid']) {
                    echo "Erreur dans le nom d'utilisateur ou le mot de passe";
                    unset($_SESSION['LoginInvalid']);
                } ?>
                </div>
                <input type="text" class="form-control form-control-lg" name="username" placeholder="Entrez votre nom d'utilisateur">
                <input type="password" class="form-control form-control-lg" name="password" placeholder="Entrez votre mot de passe">

                <div class="form-group d-flex justify-content-between">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" checked="">
                        <label class="custom-control-label" for="checkbox-remember">Se souvenir de moi</label>
                    </div>
                    <a href="#" style="color:#01bd1d">Réinitialiser le mot de passe</a>
                </div>

                <button type="submit" name="submit" class="btn btn-lg btn-block btn-primary green" >Se connecter</button>

                <div class="text-center">
                    Première visite. <a  href="#" style="color:#01bd1d">Créer un compte</a>.
                </div>
            </div>

        </div>
</form>

</div>
<?php
PageFrame::footer();
?>