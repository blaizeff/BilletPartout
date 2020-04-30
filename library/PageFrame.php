<?php
class PageFrame
{
    public static function header() {
        echo ('<header>
                <script type="text/javascript">
                $( document ).ready(function() {
                    $(".navSearch").on("click",()=>{
                        document.location.href = "/show/list?search="+$("#navSearchInput").val();
                    });
                });
            </script>
            <nav>
                <a style="margin-right:0px;" href="/"><img src="/public/images/logo_green.png" height="40px" width="232px" ></a>
                <form action="/show/list" class="navSearchBar">
                    <input id="navSearchInput" name="search" type="text" placeholder="Rechercher un spectacle..">
                    <i class="navSearch fas fa-search"></i>
                    <button id="submit" type="submit"></button>
                </form>
                <a class="login" id="login" href="/profile/login">
                '.(isset($_SESSION["user"]) ? $_SESSION["user"]["nomClient"] : '').'<i class="profileIcon fas fa-user"></i></a>
                
        </nav>
    </header>');
    }
    //ajouter un drop down pour profile/logout si user est logged in sinon diriger vers la page de login
    public static function footer()
    {
        echo ('<footer>BilletPartout &copy; 2020</footer>');
    }
    public static function loadBundle()
    {
        echo ('
        <script src="https://kit.fontawesome.com/c681f65641.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/public/css/MasterStyle.css">');
    }

    public static function loadSlider() {
        echo (' 
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
        <script src="/public/js/slider.js"></script>');
    }
}
