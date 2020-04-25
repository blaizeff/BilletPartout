<?php
include_once 'DB.php';
class User
{
    private $DB;
    private $table = "Clients";
    public function __construct()
    {
        $this->DB = new DB();
    }

    public function get($id) {
        return $this->DB->get($this->table,$id);
    }
    public function getFromEmail($email)
    {
        return $this->DB->getWhere($this->table, "Courriel", $email);
    }

    public function validateCredentials($email, $password)
    {
        $result = $this->getFromEmail($email);
        return password_verify($password, $result['mot_de_passe']);
    }

    public function emailExist($email)
    {
        $result = $this->getFromEmail($email);
        return $result != null;
    }
    public function createUser($email, $password)
    {
        $data = [
            "courriel" => $email,
            "mot_de_passe" => password_hash($password, PASSWORD_DEFAULT)
        ];
        $result = $this->DB->create($this->table, $data);
        $_SESSION['LoginInvalid'] = $result;
        return $result;
    }

    public function updateUser($data)
    {

        return true;
    }
    public static function errorMessage()
    {
        if (isset($_SESSION['LoginInvalid'])) {
            $temp = $_SESSION['LoginInvalid'];
            unset($_SESSION['LoginInvalid']);
            return $temp;
        }
        return "";
    }
}