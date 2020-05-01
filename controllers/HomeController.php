<?php
require_once("./models/Show.php");

class HomeController extends Controller {
    public static function View($page)
    {
        $show = new Show();
        $enVedette = $show->getAllShow(["id" => "1"])[0];
        $enVedette['categorie'] = $show->getEvent(1)[0]['categorie'];
        $plusVendus = [
            $show->getAllShow(["id" => "2"])[0],
            $show->getAllShow(["id" => "3"])[0],
            $show->getAllShow(["id" => "4"])[0],
        ];
        $plusVendus[0]['categorie'] = $show->getEvent(2)[0]['categorie'];
        $plusVendus[1]['categorie'] = $show->getEvent(3)[0]['categorie'];
        $plusVendus[2]['categorie'] = $show->getEvent(4)[0]['categorie'];
        
        require_once("./Views/home.php");
    }
}
?>