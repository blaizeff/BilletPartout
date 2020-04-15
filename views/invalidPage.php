<?php
PageFrame::header();
PageFrame::loadBundle();
?>
<style>
    .center-div {
    position: absolute;
    margin: auto;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 500px;
    height: 500px;
    border-radius: 3px;
    
}

</style>
<div class="center-div">
<h1 style="font-size:5em;color:#707070;">Oops!</h1>
<h2>Nous ne trouvons pas la page que vous cherchez.</h2>
<a href="/" style="color:#01bd1d">Revenir vers la page d'acceuil >></a>
</div>

<?php
PageFrame::footer();
?>