<?php

class UserAcess
{
    public static function restrictPage()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /profile/login');
        }
    }
    public static function isAdmin()
    {
        return isset($_SESSION["user"]) && $_SESSION["user"]["Admin"];
    }
    public static function adminPage()
    {
        require_once("./models/User.php");

        $user = new User();
        if (!self::isAdmin()) {
            header('Location: /profile/login');
        }
    }
}
