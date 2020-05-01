<?php
require_once("./models/Show.php");

class HomeController extends Controller {
    public static function View($page)
    {
        $show = new Show();
        $enVedette = $show->getAllShow(["id" => "1"])[0];
        $plusVendus = [
            $show->getAllShow(["id" => "2"])[0],
            $show->getAllShow(["id" => "3"])[0],
            $show->getAllShow(["id" => "4"])[0],
        ];
        require_once("./Views/home.php");
    }
}
?>