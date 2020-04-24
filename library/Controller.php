<?php
//Base Controller
class Controller
{
    //return if the input contain a illegal char
    public static function validCharacter($input) {
        $charInvalid = ["<",">",";","|","\"","'","/"];

        foreach($charInvalid as $char) {
            if (strpos($input,$char) === true){
                return false;
            }
        }
        return true;
    }
    public static function View($viewName)
    {
        require_once("./Views/" . $viewName . ".php");
    }
}
?>