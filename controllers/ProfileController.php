<?php
class ProfileController extends Controller {
    public static function View($page)
    {
        switch($page) {
            case "History":

            case "Homepage":
        }  
        require_once("./Views/profile/" . $page . ".php");
    }
}
?>