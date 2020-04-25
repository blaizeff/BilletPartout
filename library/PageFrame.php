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
                <div class="navSearchBar">
                    <input id="navSearchInput" name="search" type="text" placeholder="Rechercher un spectacle..">
                    <i class="navSearch fas fa-search"></i>
                </div>
                <!--
                <a href=""><span class="navButton">Concerts</span></a>
                <a href=""><span class="navButton">Sports</span></a>
                <a href=""><span class="navButton">Théâtre</span></a>
                -->
                <a href="/profile/login"><i class="profileIcon fas fa-user"></i></a>
        </nav>
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
        <link rel="stylesheet" href="/public/css/MasterStyle.css">');
    }
}
