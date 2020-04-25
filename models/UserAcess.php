<?php
class UserAcess
{
    public static function restrictPage()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /profile/login');
        }
    }
    public static function isAdmin() {
        return isset($_SESSION["user"]) && $_SESSION["user"]["Admin"];
    }
    public static function adminPage()
    {
        $user = new User();
        if (!(isset($_SESSION['user']) && $user->get($_SESSION["user"])["idClient"])) {
            header('Location: /profile/login');
        }
    }
}