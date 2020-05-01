<?php
require_once("./models/Show.php");

class ShowController extends Controller
{
    public static function ListView($page)
    {
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
        if (isset($_GET['minPrice']) && $_GET['minPrice'] != '') {
            $filter["minPrice"] = $_GET['minPrice'];
        }
        if (isset($_GET['maxPrice']) && $_GET['maxPrice'] != '') {
            $filter["maxPrice"] = $_GET['maxPrice'];
        }
        if (isset($_GET['startDate']) && $_GET['startDate'] != '') {
            $filter["startDate"] = $_GET['startDate'];
        }
        if (isset($_GET['endDate']) && $_GET['endDate'] != '') {
            $filter["endDate"] = $_GET['endDate'];
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
            $data = $show->getEvent($_GET['id'])[0];
        }
        $title = $data['title'];
        $artist = $data['artist'];
        //$venueName = $data['venueName'];
        $venueAddress = $data['venueLocation'];
        $venue = $data['venueName'];
        $categoryName = "Categorie";
        $months = [
            0 => "Janvier",
            1 => "Février",
            2 => "Mars",
            3 => "Avril",
            4 => "Mai",
            5 => "Juin",
            6 => "Juillet",
            7 => "Août",
            8 => "Septembre",
            9 => "Octobre",
            10 => "Novembre",
            11 => "Décembre"
        ];
        $dateRaw = explode("-", explode(" ", $data['Date'])[0]);
        $date = $dateRaw[2] . " " . $months[intval($dateRaw[1])] . " " . $dateRaw[0];
        $timeArray = explode(":", explode(" ", $data['Date'])[1]);
        $time = $timeArray[0] . "h" . $timeArray[1];
        $description = $data['description'];
        require_once("./Views/show/" . $page . ".php");
    }
}
