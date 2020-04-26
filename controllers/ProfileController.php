<?php
require_once("./models/User.php");
require_once("./models/UserAcess.php");
class ProfileController extends Controller
{
    public static function HomepageView($viewName)
    {
        
        UserAcess::restrictPage();
        require_once("./Views/profile/" . $viewName . ".php");

        //THIS IS WHERE I WILL BE WORKING
    }
    public static function LoginView($viewName)
    {
        $data = [];

        //[POST]
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && Components::verifyPostValue(["email","password"])) {
            $user = new User();
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (!Components::validCharacter($email) && !Components::validCharacter($password)) {
                $data['LoginInvalid'] = "Votre nom d'utilisateur ou votre mot de passe est invalide";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['LoginInvalid'] = "Votre adresse courriel est invalide";
            } else if ($user->validateCredentials($email, $password)) {
                //Crer la session user
                $_SESSION["user"]=$user->getFromEmail($email);
                if (UserAcess::isAdmin()) {
                    header('location: /admin/');
                } else {
                    header('location: homepage');
                }
            } else {
                $data['LoginInvalid'] = "Votre mot de passe est invalide";
            }
        }
        //[GET]
        require_once("./Views/profile/" . $viewName . ".php");
    }
    public static function SignUpView($viewName)
    {
        $data = [];
        //[POST]
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && Components::verifyPostValue(["email","password","confirm"])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];
            $user = new User();

            if ($confirm !== $password) {
                $data['LoginInvalid'] = "les mot de passes ne concordent pas";
            }
            else if (!Components::validCharacter($email) && !Components::validCharacter($password)) {
                $data['LoginInvalid'] = "Votre nom d'utilisateur ou votre mot de passe est invalide";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['LoginInvalid'] = "Votre adresse courriel est invalide";
            } else if ($user->emailExist($email)) {
                $data['LoginInvalid'] = "Cette adresse Courriel existe déjà";
            } else if ($user->createUser($email, $password)) {
                //Crer la session user
                $_SESSION["user"]=$user->getFromEmail($email);
                header('location: homepage');
            } else {
                $data['LoginInvalid'] = "Erreur lors de la connexion";
            }
        }

        //[GET]
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