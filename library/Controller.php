<?php
//Base Controller
class Controller
{
    public static function View($viewName)
    {
        require_once("./Views/" . $viewName . ".php");
    }
}
?>