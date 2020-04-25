<?php
class Cart extends Controller {
    public static function View($page)
    {
        switch($page) {
            case "payment":

            case "checkout":
        }  
        require_once("./Views/cart/" . $page . ".php");
    }
}
?>