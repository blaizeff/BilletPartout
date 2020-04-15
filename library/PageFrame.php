<?php
class PageFrame
{
    public static function header() {
        echo ('<nav class="navcontainer navbar navbar-expand-sm sticky-top">
        <div class="container" style="padding:0">
            <a class="navbar-brand" href="/.">
                <!--Link to home page-->
                <img src="/public/images/logo_white.png" width="185" height="35">
            </a>
            <input class="nav-searchbar"type="search" placeholder="Évènement, Artiste ou un Groupe">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Concerts
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Théatre</a>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>');
    }
    public static function footer()
    {
        echo ('<footer>BilletPartout &copy; 2020</footer>');
    }
    public static function loadBundle()
    {
        echo ('<link rel="stylesheet" href="/public/css/MasterStyle.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>');
    }
}
