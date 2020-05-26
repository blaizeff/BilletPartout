<div class="layout">
<link rel="stylesheet" href="<?php echo $_SERVER['basePath'] ?>public/css/login.css">
    <?php
    PageFrame::loadBundle();
    PageFrame::header();
    ?>
    <form id="form" class="container" method="POST" action="">
        <div class="row align-items-center justify-content-center no-gutters ">
            <div class="col-12 col-md-5 col-lg-5 py-8 py-md-11 card" style="margin-top:240px;">
            <div style="padding:50px 30px 50px 30px">
                <h1 class="title">Se connecter</h1>
                <div style="color:red;text-align:center"><?php echo User::errorMessage($data); ?></div>
                <input type="text" class="form-control form-control-lg customInput loginInput" name="email" placeholder="Entrez votre adresse courriel">
                <input type="password" class="form-control form-control-lg customInput loginInput" name="password" placeholder="Entrez votre mot de passe">

                <div class="form-group d-flex justify-content-between">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="remember">
                        <label class="custom-control-label" for="remember">Se souvenir de moi</label>
                    </div>
                    <a href="#" style="color:#21c87a">Réinitialiser le mot de passe</a>
                </div>

                <button type="submit" name="submit" class="btn btn-lg btn-block btn-primary green">Se connecter</button>

                <div class="text-center">
                    Première visite. <a href="SignUp<?php echo isset($_GET['redirect']) ? '?redirect='.$_GET['redirect']: ''?>" style="color:#21c87a">Créer un compte</a>.
                </div>
            </div>
            </div>

        </div>
    </form>

</div>
<?php
PageFrame::footer();
?>