<?php
class Route {

    //List of all valid page
    public static $validRoute = array();

    //add the route in validRoute
    public static function set($route,$function) {
        self::$validRoute[] = $route;
        
        if ($_GET['url'] == $route) {
            $function->__invoke();
        } 
    }
}
?>