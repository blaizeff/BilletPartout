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
        if (isset($_GET['category']) && $_GET['category'] != '') {
            $filter["category"] = $_GET['category'];
        }
        $events = new Show();
        $data["listShow"] = $events->getAllShow($filter);
        require_once("./Views/Show/" . $page . ".php");
    }

    public static function View($page)
    {
        require_once("./Views/show/" . $page . ".php");
    }

    public static function InfoView($page)
    {
        if (isset($_GET['id']) && is_int((int) $_GET["id"])) {
            $show = new Show();
            $data = $show->getEvent( $_GET['id'])[0];
        }
        require_once("./Views/show/" . $page . ".php");
    }

}
?>