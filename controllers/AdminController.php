
<?php
require_once("./models/Show.php");
require_once("./models/Location.php");

require_once("./models/UserAcess.php");

class AdminController extends Controller
{
    public static function showView($viewName)
    {

        //[POST]
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && Components::verifyPostValue(["title", "description", "artist", "showCategory"])) {
            $show = new Show();

            if (Components::verifyPostValue(["id"])) {
                $id = $_POST["id"];
                echo $show->update($id, $_POST["title"], $_POST["description"], $_POST["artist"], $_POST["showCategory"],$_POST["basePrice"]);
            } else {
                $id = $show->create($_POST["title"], $_POST["description"], $_POST["artist"], $_POST["showCategory"]);
            }

            if ($id)
                Components::uploadImage("show", "show" . $id . ".jpg");

            header('Location: /admin/showlist');
        }

        //[GET]
        //render page Modify a Show else render paghe Create a Show
        if (isset($_GET['id']) && is_int((int) $_GET["id"])) {
            $show = new Show();
            $data = $show->get($_GET['id']);
            $data['pageState'] = "Modifier";
            $data['returnLink'] = "./showlist";
        } else {
            $data = [
                'title' => '',
                'events'=>'',
                'pageState' => 'Ajouter',
                'returnLink' => './showlist',
                'description' => '',
                'artist' => '',
                'idCat' => '',
                'basePrice'=>''
            ];
        }
        require_once("./views/admin/" . $viewName . ".php");
    }

    public static function showListView($viewName)
    {
        UserAcess::adminPage();
        $show = new Show();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && Components::verifyPostValue(["showId"])) {
            $show = new Show();
            $id = $_POST["showId"];
            printf($id);
            $show->delete($id);   
        }
        $data["showList"] = $show->selectAll();
        require_once("./views/admin/" . $viewName . ".php");
    }

    public static function locationListView($viewName)
    {
        UserAcess::adminPage();
        $location = new Location();
        $data['error'] = false;
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && Components::verifyPostValue(["locationId"])) {
            $id = $_POST["locationId"];
            $show = new Show();

            $venueName = $location->get($id)['name'];
            $events = $show->getAllShow([]);
            foreach ($events as $event) {
                if ($event["venueName"] == $venueName) {
                    $data['error'] = true;
                    break;
                }
            }
            if (!$data['error']) {
                $location->delete($id);
            }
        }
        $data["locationList"] = $location->selectAll();
        require_once("./views/admin/" . $viewName . ".php");
    }

    public static function clientListView($viewName)
    {
        UserAcess::adminPage();

        require_once("./views/admin/" . $viewName . ".php");
    }

    public static function fidelityListView($viewName)
    {
        UserAcess::adminPage();

        require_once("./views/admin/" . $viewName . ".php");
    }

    public static function locationView($viewName)
    {
        UserAcess::adminPage();
        //[POST]
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && Components::verifyPostValue(["title", "address"])) {
            $location = new Location();
            //UPDATE
            if (Components::verifyPostValue(["id"])) {
                $id = $_POST["id"];
                $location->update($id, $_POST["title"], $_POST["address"]);
                //Add Section
                if ($_POST['addSection']['name'] != '' && $_POST['addSection']['priceRatio'] != '' && $_POST['addSection']['color'] != '' && $_POST['addSection']['capacity'] != '') {
                    $location->addSection($id, $_POST['addSection']['name'], $_POST['addSection']['priceRatio'], $_POST['addSection']['color'], $_POST['addSection']['capacity']);
                }
                //Update Section
                foreach ($_POST as $row) {
                    if (isset($row['id']) && isset($row['name'])) {
                        $location->updateSection($row['id'], $row);
                    }
                }
                //DeleteSection
                if (Components::verifyPostValue(["sectionId"])) {
                    $location->deleteSection($_POST['sectionId']);
                }

                //CREATE
            } else {
                $id = $location->create($_POST["title"], $_POST["address"]);
            }
        }

        //GET
        //render the page Modify else render the page Create
        if (isset($_GET['id']) && is_int((int) $_GET["id"])) {
            $location = new Location();
            $data = $location->get($_GET['id']);
            $data['pageState'] = "Modifier";
            $data["sections"] = $location->getSections($_GET["id"]);
        } else {
            $data = [
                'name' => '',
                'pageState' => 'Ajouter',
                'address' => '',
                'sections' => ''
            ];
        }
        require_once("./views/admin/" . $viewName . ".php");
    }
}
?>
