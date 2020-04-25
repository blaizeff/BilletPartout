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
        if (
            isset($_POST['email']) && $_POST['email'] != '' &&
            isset($_POST['password']) && $_POST['password'] != ''
        ) {
            $user = new User();
            $email = $_POST['email'];
            $password = $_POST['password'];
            if ($user->validateCredentials($email, $password)) {
                header('location: homepage');
            } else {
                $_SESSION['LoginInvalid'] = "Votre nom d'utilisateur ou votre mot de passe est invalide";
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
            } else if ($user->emailExist($email)) {
                $_SESSION['LoginInvalid'] = "Cette adresse Courriel existe déjà";
            } else if ($user->createUser($email, $password)) {
                header('location: homepage');
            } else {
                $_SESSION['LoginInvalid'] = "Erreur lors de la connexion";
            }
        }
        print_r($_POST);
        
        //[GET]
        require_once("./Views/profile/" . $viewName . ".php");
    }
}
