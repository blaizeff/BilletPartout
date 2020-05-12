
<?php
require_once("./models/Show.php");
require_once("./models/Location.php");

require_once("./models/UserAcess.php");

class AdminController extends Controller
{
    public static function indexView($viewName)
    {
        UserAcess::adminPage();
        $show = new Show();
        $location = new Location();
        $data["showList"] = $show->selectAll();
        $data["locationList"] = $location->selectAll();
        require_once("./views/admin/" . $viewName . ".php");
    }

    public static function showView($viewName)
    {
        //[POST]
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && Components::verifyPostValue(["title", "description", "artist", "showCategory"])) {
            $show = new Show();

            if (Components::verifyPostValue(["id"])) {
                $id = $_POST["id"];
                echo $show->update($id,$_POST["title"], $_POST["description"], $_POST["artist"], $_POST["showCategory"]);
            } else {
                $id = $show->create($_POST["title"], $_POST["description"], $_POST["artist"], $_POST["showCategory"]);
            }

            if ($id)
                Components::uploadImage("show", "show" . $id.".jpg");

            header('Location: ./');
        }

        //[GET]
        //render page Modify a Show else render paghe Create a Show
        if (isset($_GET['id']) && is_int((int) $_GET["id"])) {
            $show = new Show();
            $data = $show->get($_GET['id']);
            $data['pageState'] = "Modifier";
            $data['returnLink'] = "./details?id=".$_GET["id"];
        } else {
            $data = [
                'title' => '',
                'pageState' => 'Ajouter',
                'returnLink' => './',
                'description' => '',
                'artist' =>'',
                'idCat' =>'',
            ]; 
        }
        require_once("./views/admin/" . $viewName . ".php");
    }

    public static function eventView($viewName)
    {
        require_once("./views/admin/" . $viewName . ".php");
    }

    public static function detailsView($viewName)
    {
        if (isset($_GET["id"]) && is_int((int) $_GET["id"])) {
            $show = new Show();
            $data = $show->get($_GET["id"]);
            require_once("./views/admin/" . $viewName . ".php");
        } else {
            require_once("./views/invalidPage.php");
        }
    }

    public static function locationView($viewName)
    {

        //POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && Components::verifyPostValue(["title", "address"])) {
            $location = new Location();
            if (Components::verifyPostValue(["id"])) {
                $id = $_POST["id"];
                 $location->update($id,$_POST["title"], $_POST["address"]);
            } else {
                $id = $location->create($_POST["title"], $_POST["address"]);
            }
            header('Location: ./');
        }

        //GET
        //render the page Modify else render the page Create
        if (isset($_GET['id']) && is_int((int) $_GET["id"])) {
            $location = new Location();
            $data = $location->get($_GET['id']);
            $data['pageState'] = "Modifier";
        } else {
            $data = [
                'name' => '',
                'pageState' => 'Ajouter',
                'address' => '',
            ]; 
        }
        require_once("./views/admin/" . $viewName . ".php");
    }
}
?>
