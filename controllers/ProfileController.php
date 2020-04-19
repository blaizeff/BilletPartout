<?php
require_once("./models/User.php");
class ProfileController extends Controller
{
    public static function View($page)
    {
        switch ($page) {
            case "History":

            case "Homepage":
        }
        require_once("./Views/profile/" . $page . ".php");
    }
    public static function LoginView($viewName)
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (User::validateCredentials($username, $password)) {
                header('location: profile/homepage');
            } else {
                $_SESSION['LoginInvalid'] = true;
            }
        }
        require_once("./Views/profile/" . $viewName . ".php");
    }
}
