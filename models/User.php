<?php
class User
{
    public static function validateCredentials($email, $password)
    {
        if ($email == "" || $password == "") {
            return false;
        }

        //TODO: Faire les requètes à la BD
        return ($email == "client" && $email == "client");
    }
    public static function createUser($email,$password) {
        //TODO : faire la requète 
        return true;
    }
    public static function errorMessage()
    {
        if (isset($_SESSION['LoginInvalid']) && $_SESSION['LoginInvalid']) {
            unset($_SESSION['LoginInvalid']);
            return "Erreur dans le nom d'utilisateur ou le mot de passe";
        }
        return "";
    }
}
