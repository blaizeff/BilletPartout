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
        require_once("./views/Show/" . $page . ".php");
    }

    public static function View($page)
    {
        require_once("./views/show/" . $page . ".php");
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
        $categoryName = $data["categorie"];
        $show = new Show();
        $categories = $show->getAllCategory();
        $categoryId = "";
        foreach($categories as $value){
            if($value['value'] == $categoryName)
            {
                $categoryId = $value['id'];
            }
        }
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
        $date = $dateRaw[2] . " " . $months[intval($dateRaw[1])-1] . " " . $dateRaw[0];
        $timeArray = explode(":", explode(" ", $data['Date'])[1]);
        $time = $timeArray[0] . "h" . $timeArray[1];
        $description = $data['description'];
        $venues = [
            [
                "Id" => 1,
                "Name" => "Centre Bell",
                "Address" => "1909 Avn des Canadiens-de-Montréal, Montréal",
                "Sections" => [
                    "Admission Générale",
                    "Section VIP",
                    "Section Plancher"
                ]
            ],
            [
                "Id" => 2,
                "Name" => "Place Bell",
                "Address" => "1950 Rue Claude-Gagné, Laval, QC H7N 5H9",
                "Sections" => [
                    "Section A",
                    "Section B",
                    "Section C"
                ]
            ],
            [
                "Id" => 3,
                "Name" => "Théatre Saint-Jérome",
                "Address" => "118 Rue de la Gare, Saint-Jérôme",
                "Sections" => [
                    "Admission Générale",
                    "Section De Luxe"
                ]
            ],
            [
                "Id" => 4,
                "Name" => "Théâtre Lionel-Groulx",
                "Address" => "100 rue Duquet, Sainte-Thérèse",
                "Sections" => [
                    "Admission Générale",
                    "Section VIP",
                    "Section Extra VIP",
                    "Section Avant-Scène"
                ]
            ],
        ];
        $venueInfo = [];
        if($venue == "Centre Bell"){
            $venueInfo = $venues[0];
        }
        else if($venue == "Place Bell"){
            $venueInfo = $venues[1];
        }
        else if($venue == "Théatre Saint-Jérome"){
            $venueInfo = $venues[2];
        }
        else if($venue == "Théâtre Lionel-Groulx"){
            $venueInfo = $venues[3];
        }
        require_once("./views/show/" . $page . ".php");
    }
}
