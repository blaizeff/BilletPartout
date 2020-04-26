
<?php
require_once("./models/Show.php");

class AdminController extends Controller
{
    public static function View($page)
    {
        require_once("./Views/admin/" . $page . ".php");
    }
    public static function IndexView($viewName)
    {
        $show = new Show();
        $data = $show->selectAll();
        require_once("./models/UserAcess.php");
        require_once("./Views/admin/" . $viewName . ".php");
    }
    public static function AddView($viewName)
    {
        print_r($_POST);
        //[POST]
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && Components::verifyPostValue(["title", "description", "artist", "showCategory"])) {
            $show = new Show();
            $id = $show->CreateShow($_POST["title"], $_POST["description"], $_POST["artist"], $_POST["showCategory"]);
            if ($id)
                Components::uploadImage("show", "show" . $id);
        }

        //[GET]
        require_once("./models/UserAcess.php");
        require_once("./Views/admin/" . $viewName . ".php");
    }
}
?>
