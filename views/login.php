<link rel="stylesheet" href="public/css/login.css">

<div class="layout">
    <?php
    PageFrame::loadBundle();
    PageFrame::header();
    ?>
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center no-gutters ">

            <div class="col-12 col-md-5 col-lg-4 py-8 py-md-11" style="padding-top:240px">

                <!-- Heading -->
                <h1 class="font-bold text-center">Se connecter</h1>

                <p class="text-center mb-6"> </p>
                <!-- Form -->
                <div class="mb-6">
                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="sr-only">Adresse Courriel</label>
                        <input type="email" class="form-control form-control-lg" id="email" style="background-color:#edeef6;border:none" placeholder="Entrez votre courriel">
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="sr-only">Mot de passe</label>
                        <input type="password" class="form-control form-control-lg" id="password" style="background-color:#edeef6;border:none" placeholder="Entrez votre mot de passe">
                    </div>

                    <div class="form-group d-flex justify-content-between">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" checked="" id="checkbox-remember">
                            <label class="custom-control-label" for="checkbox-remember">Se souvenir de moi</label>
                        </div>
                        <a href="./password-reset.html" style="color:#01bd1d">Réinitialiser le mot de passe</a>
                    </div>

                    <!-- Submit -->
                    <button class="btn btn-lg btn-block btn-primary green" onclick="window.location.href='profile/homepage';">Se connecter</button>
                </div>

                <!-- Text -->
                <p class="text-center">
                    Première visite. <a style="color:#01bd1d">Créer un compte</a>.
                </p>

            </div>

        </div> <!-- / .row -->
    </div>

</div>
<?php
PageFrame::footer();
?>