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
            $filter = [
                "id" => $_GET['id']
            ];
            $data = $show->getAllShow($filter)[0];
            print_r($data);
        }
        require_once("./Views/show/" . $page . ".php");
    }

}
?>