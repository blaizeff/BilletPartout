<?php
    require_once("./models/Show.php");

class ShowController extends Controller {
    public static function View($page)
    {
        require_once("./Views/Show/" . $page . ".php");
    }
    public static function ListView($page) {
        //[GET]
        $events = new Show();
        $_SESSION["listShow"] = $events->getAllShow();
        require_once("./Views/Show/" . $page . ".php");
    }
}
?>