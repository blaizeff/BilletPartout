<?php
require_once("./models/User.php");
require_once("./models/UserAcess.php");
class ProfileController extends Controller
{
    public static function HomepageView($viewName)
    {
        
        UserAcess::restrictPage();
        require_once("./Views/profile/" . $viewName . ".php");
    }
    public static function LoginView($viewName)
    {
        //[POST]
        if (
            isset($_POST['email']) && $_POST['email'] != '' &&
            isset($_POST['password']) && $_POST['password'] != ''
        ) {
            $user = new User();
            $email = $_POST['email'];
            $password = $_POST['password'];


            if (!parent::validCharacter($email) && !parent::validCharacter($password)) {
                $_SESSION['LoginInvalid'] = "Votre nom d'utilisateur ou votre mot de passe est invalide";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['LoginInvalid'] = "Votre adresse courriel est invalide";
            } else if ($user->validateCredentials($email, $password)) {
                $_SESSION["user"]=$user->getFromEmail($email);
                if (UserAcess::isAdmin()) {
                    header('location: admin');
                } else {
                    header('location: homepage');
                }
            } else {
                $_SESSION['LoginInvalid'] = "Votre mot de passe est invalide";
            }
        }
        //[GET]
        require_once("./Views/profile/" . $viewName . ".php");
    }
    public static function SignUpView($viewName)
    {
        //[POST]
        if (
            isset($_POST['email']) && $_POST['email'] != '' &&
            isset($_POST['password']) && $_POST['password'] != '' &&
            isset($_POST['confirm']) && $_POST['confirm'] != ''
        ) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = new User();


            if (!parent::validCharacter($email) && !parent::validCharacter($password)) {
                $_SESSION['LoginInvalid'] = "Votre nom d'utilisateur ou votre mot de passe est invalide";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['LoginInvalid'] = "Votre adresse courriel est invalide";
            } else if ($user->emailExist($email)) {
                $_SESSION['LoginInvalid'] = "Cette adresse Courriel existe déjà";
            } else if ($user->createUser($email, $password)) {
                $_SESSION["user"]=$user->getFromEmail($email);
                header('location: homepage');
            } else {
                $_SESSION['LoginInvalid'] = "Erreur lors de la connexion";
            }
        }

        //[GET]
        require_once("./Views/profile/" . $viewName . ".php");
    }
    public static function AdminView($viewName) {
        require_once("./models/UserAcess.php");
        require_once("./Views/profile/" . $viewName . ".php");
    }

    public static function Logout() {
        if (isset($_GET['page'])) {
            unset($_SESSION["user"]);
            header('Location: /'.$_GET['page']);
        }
        else {
            ProfileController::Logout();
        }
        
    }
}