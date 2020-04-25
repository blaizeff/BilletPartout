<div class="layout">
    <?php
    PageFrame::header();
    PageFrame::loadBundle();
    ?>
    <link rel="stylesheet" href="/public/css/login.css">

    <form id="form" class="container" method="POST" action="">
        <div class="row align-items-center justify-content-center no-gutters ">
            <div class="col-12 col-md-5 col-lg-4 py-8 py-md-11" style="padding-top:240px">
                <h1 class="title">Créer un compte</h1>
                <div style="color:red;text-align:center"><?php echo User::errorMessage(); ?></div>
<<<<<<< HEAD
                <input type="text" class="form-control form-control-lg customInput" name="email" placeholder="Entrez votre adresse courriel" required>
                <input type="password" class="form-control form-control-lg customInput loginInput" name="password" placeholder="Entrez votre mot de passe" required>
                <input type="password" class="form-control form-control-lg customInput loginInput" name="confirm" placeholder="Confirmez votre mot de passe" required>
=======
                <input type="text" class="form-control form-control-lg customInput" name="email" placeholder="Entrez votre adresse courriel">
                <input type="password" class="form-control form-control-lg customInput" name="password" placeholder="Entrez votre mot de passe">
                <input type="password" class="form-control form-control-lg customInput" name="confirm" placeholder="Confirmez votre mot de passe">
>>>>>>> fbf2fb03c586af0dd4cc3fb27bf310ec9cc1bf58
                <button type="submit" name="submit" class="btn btn-lg btn-block btn-primary green">Se connecter</button>

                <div class="text-center">
                    Déjà un compte. <a href="login" style="color:#01bd1d">Connectez-vous</a>.
                </div>
            </div>

        </div>
    </form>

</div>
<?php
PageFrame::footer();
?>