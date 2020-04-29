<?php
    require_once("./models/Show.php");

class ShowController extends Controller {
    public static function ListView($page) {
        //[GET]
        $filter = [];

        if (isset($_GET['search']) && $_GET['search'] != '') {
            $filter["search"] = $_GET['search'];
        }
        if (isset($_GET['order']) && $_GET['order'] != '') {
            $filter["order"] = $_GET['order'];
        }
        $events = new Show();
        $data["listShow"] = $events->getAllShow($filter);
        print_r($events->getEvent(3));
        require_once("./Views/Show/" . $page . ".php");
    }
}
?>