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
        //Note a mathieu don't delete: https://www.sitepoint.com/community/t/multiple-forms-on-one-page/43577
        $user = new User;
        $user->loadUser($_SESSION["user"]["idClient"]);
        
        //[POST]
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //this is for the Profile modification
            if(array_key_exists("submitProfile",$_POST) && $_POST["submitProfile"])
            {
                //addr doesn't exist but it's in the DB so idk lol, for now null will do
                if(filter_var($_POST["courriel"], FILTER_VALIDATE_EMAIL)) //&& !Components::validCharacter($_POST["courriel"]) && !Components::validCharacter($_POST["nom"])
                {
                    $data = ["nomClient" => $_POST["nom"], "Courriel" => $_POST["courriel"], "numTelephone" => $_POST["telephone"]];

                    $result = $user->updateUserProfile($_SESSION["user"]["idClient"], $data);
                    //Crer la session user
                    $_SESSION["user"]=$user->get($_SESSION["user"]["idClient"]); 
                    echo "<meta http-equiv='refresh' content='0'>";
                }
                else{
                    echo '<script>alert("Nom, courriel ou numéro de téléphone invalide. SVP ne pas utiliser de charactères spéciaux.")</script>';
                }
            }
            //this is for password modification
            elseif(array_key_exists("submitPass",$_POST) && $_POST["submitPass"])
            {
                if(Components::verifyPostValue(["oldPass", "newPass", "newPassConfirm"]))
                {
                    if(password_verify($_POST["oldPass"], $_SESSION["user"]["mot_de_passe"]) )
                    {
                        if($_POST["newPass"] == $_POST["newPassConfirm"])
                        {
                            $hashedNewPass = password_hash($_POST["newPass"], PASSWORD_DEFAULT);

                            $result = $user->updateUserPassword($_SESSION["user"]["idClient"], $hashedNewPass);
                        }
                        else{ echo '<script>alert("SVP s\'assurez que le nouveau mot de passe est identique à la confirmation.")</script>';  }
                    }
                }
                else{
                    echo '<script>alert("SVP remplir toutes les cases pour modifier son mot de passe.")</script>';
                }

            }
        }

        //[GET]
        require_once("./Views/profile/" . $viewName . ".php");
        

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
                    header('location: '.$_SERVER["basePath"].'admin/');
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
                //Create Session User
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
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
        }
        
        if (isset($_GET['page'])) {
            header('Location: '.$_SERVER['basePath'].$_GET['page']);
        }
        else {
            header('Location: '.$_SERVER['basePath'].'profile/login');
        }
        
    }
}