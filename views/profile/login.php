<div class="layout">
    <?php
    PageFrame::header();
    PageFrame::loadBundle();
    ?>
    <link rel="stylesheet" href="/public/css/login.css">

    <form id="form" class="container needs-validation" method="POST" action="">
        <div class="row align-items-center justify-content-center no-gutters ">
            <div class="col-12 col-md-5 col-lg-4 py-8 py-md-11" style="padding-top:240px">

                <h1 class="title">Se connecter</h1>
                <div style="color:red;text-align:center"><?php echo User::errorMessage(); ?></div>
                <input type="email" class="form-control form-control-lg customInput" name="email" placeholder="Entrez votre adresse courriel" required>
                <input type="password" class="form-control form-control-lg customInput" name="password" placeholder="Entrez votre mot de passe" required>

                <div class="form-group d-flex justify-content-between">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" class="custom-control-input" name="remember">
                        <label class="custom-control-label" for="remember">Se souvenir de moi</label>
                    </div>
                    <a href="#" style="color:#01bd1d">Réinitialiser le mot de passe</a>
                </div>

                <button type="submit" name="submit" class="btn btn-lg btn-block btn-primary green ">Se connecter</button>

                <div class="text-center">
                    Première visite. <a href="SignUp" style="color:#01bd1d">Créer un compte</a>.
                </div>
            </div>

        </div>
    </form>
</div>
<?php
PageFrame::footer();
?>