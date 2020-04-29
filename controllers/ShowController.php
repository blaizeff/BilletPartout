<?php
    require_once("./models/Show.php");

class ShowController extends Controller {
    public static function ListView($page) {
        //[GET]
        $events = new Show();
        $data["listShow"] = $events->getAllShow();
        require_once("./Views/Show/" . $page . ".php");
    }
}
?>