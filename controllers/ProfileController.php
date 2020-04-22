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
        //[POST]
        if (isset($_POST['email']) && $_POST['email'] != '' &&
            isset($_POST['password']) && $_POST['password'] != '') {
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (User::validateCredentials($email, $password)) {
                header('location: homepage');
            } else {
                $_SESSION['LoginInvalid'] = true;
            }
        }
        //[GET]
        require_once("./Views/profile/" . $viewName . ".php");
    }
    public static function SignUpView($viewName)
    {
        //[POST]
        if (isset($_POST['email']) && $_POST['email'] != '' &&
            isset($_POST['password']) && $_POST['password'] != '' &&
            isset($_POST['confirm']) && $_POST['confirm']==$_POST['password']) {
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (User::createUser($email, $password)) {
                header('location: homepage');
            } else {
                $_SESSION['LoginInvalid'] = true;
            }
        }

        //[GET]
        require_once("./Views/profile/" . $viewName . ".php");
    }
}
