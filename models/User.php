<?php
class User
{
    public static function validateCredentials($username, $password)
    {
        if ($username == "" || $password == "") {
            return false;
        }

        //Faire les requètes à la BD
        return ($username == "client" && $username == "client");
    }
}
