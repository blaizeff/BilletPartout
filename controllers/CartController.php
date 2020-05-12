<?php
class CartController extends Controller {
    public static function View($page)
    {
        switch($page) {
            case "payment":

            case "checkout":
        }  
        require_once("./views/cart/" . $page . ".php");
    }
}
?>