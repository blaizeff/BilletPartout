<?php
class PageFrame
{
    public static function header() {
        echo ('<header>
                <script type="text/javascript">
                $( document ).ready(function() {
                    $(".navSearch").on("click",()=>{
                        document.location.href = "'.$_SERVER['basePath'].'show/list?search="+$("#navSearchInput").val();
                    });
                });
            </script>
            <nav>
                <a style="margin-right:0px;" href="'.$_SERVER['basePath'].'"><img src="'.$_SERVER['basePath'].'public/images/logo_green.png" height="40px" width="232px" ></a>
                <form action="'.$_SERVER['basePath'].'show/list" class="navSearchBar">
                    <input id="navSearchInput" name="search" type="text" placeholder="Rechercher un spectacle..">
                    <i class="navSearch fas fa-search"></i>
                    <button id="submit" type="submit"></button>
                </form>');
                
                if(isset($_SESSION["user"]))
                {
                    echo('
                    <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" style="background-color:white; border:white">
                    <a class="login" id="login"><i class="profileIcon fas fa-user"></i>' . $_SESSION["user"]["nomClient"] . '</a>
                    <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        '.(UserAcess::isAdmin() ? '<li><a href="'.$_SERVER['basePath'].'admin/showlist" class="dropdown_text">Admin</a></li>' : "").'
                        <li><a href="'.$_SERVER['basePath'].'profile/homepage" class="dropdown_text">Profile</a></li>
                        <li><a href="'.$_SERVER['basePath'].'profile/logout" class="dropdown_text">Logout</a></li>
                    </ul></div>');

                }
                else{ echo('<a class="login" id="login" href="'.$_SERVER['basePath'].'profile/login"><i class="profileIcon fas fa-user"></i>Se connecter</a>'); }

        echo('</nav>
    </header>');
    }
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
        <link rel="stylesheet" href="'.$_SERVER['basePath'].'public/css/MasterStyle.css">');
    }

    public static function loadSlider() {
        echo (' 
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
        <script src="'.$_SERVER['basePath'].'public/js/slider.js"></script>');
    }
    public static function AdminNav() {
        echo ('<div class="left-nav">
        <div>
            <h4>GESTION</h4>
        </div>
            <a href="/admin/showlist">
                <div class="nav-link '.($_GET['url'] == "admin/showlist" ? 'selectedNav':"").'">
                    <i class="fas fa-theater-masks"></i> 
                    &nbsp; Spectacles
                    <i class="fas fa-angle-right"></i>
                </div>
            </a>
            <a href="/admin/locationlist">
                <div class="nav-link '.($_GET['url'] == "admin/locationlist" ? 'selectedNav':"").'">
                    <i class="fas fa-map-marked"></i> 
                    &nbsp; Salles
                    <i class="fas fa-angle-right"></i>
                </div>
            </a>
            <div>
                <h4>CLIENTS</h4>
            </div>
            <a href="/admin/clientlist">
                <div class="nav-link '.($_GET['url'] == "admin/clientlist" ? 'selectedNav':"").'">
                    <i class="fas fa-id-card"></i> 
                    &nbsp; Informations clients
                    <i class="fas fa-angle-right"></i>
                </div>
            </a>
            <a href="/admin/fidelitylist">
                <div class="nav-link '.($_GET['url'] == "admin/fidelitylist" ? 'selectedNav':"").'">
                    <i class="fas fa-star"></i> 
                    &nbsp; Fidelité
                    <i class="fas fa-angle-right"></i>
                </div>
            </a>
        </div>');
    }
}
