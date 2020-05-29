<?php

class ShowController extends Controller
{
    public static function ListView($page)
    {
        //[GET]
        $filter = [];
        $validGet = ['search','order','category','minPrice','maxPrice','startDate','endDate'];
        foreach($validGet as $get) {
            if (isset($_GET[$get]) && $_GET[$get] != '') {
                $filter[$get] = $_GET[$get];
            }
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
        //[POST]
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && Components::verifyPostValue(["nbTickets", "sectionId"]) 
            && isset($_GET['id']) && is_int((int) $_GET["id"])) {
                $_SESSION['cart']['id'] = $_GET['id'];
                $_SESSION['cart']['sectionId'] = $_POST['sectionId'];
                $_SESSION['cart']['nbTickets'] = $_POST['nbTickets'];
            header('Location: ../cart/checkout');
        }

        //[GET]
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
                ],
                "multipSection" => [
                    "Admission Générale" => 1.00,
                    "Section VIP" => 2.00,
                    "Section Plancher" => 3.00
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
                ],
                "multipSection" => [
                    "Section A" => 1.00,
                    "Section B" => 2.00,
                    "Section C" => 3.00
                ]
            ],
            [
                "Id" => 3,
                "Name" => "Théatre Saint-Jérome",
                "Address" => "118 Rue de la Gare, Saint-Jérôme",
                "Sections" => [
                    "Admission Générale",
                    "Section De Luxe"
                ],
                "multipSection" => [
                    "Admission Générale" => 1.00,
                    "Section De Luxe" => 2.00
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
                ],
                "multipSection" => [
                    "Admission Générale" => 1.00,
                    "Section VIP" => 2.00,
                    "Section Extra VIP" => 3.00,
                    "Section Avant-Scène" => 4.00
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
