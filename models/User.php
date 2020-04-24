<?php
include_once 'DB.php';
class User
{
    private $DB;
    private $table="Clients";
    public function __construct()
    {
        $this->DB = new DB();
    }
    
    public function validateCredentials($email, $password)
    {
        $result = $this->DB->getWhere($this->table,"Courriel",$email);
        return $result != null;
    }

    public function emailExist($email){
        $result = $this->DB->getWhere($this->table,"Courriel",$email);
        return $result != null;
    }
    public function createUser($email,$password) {
        $data = [
            "courriel"=>$email,
            "mot_de_passe"=>$password
        ];
        $result = $this->DB->create($this->table,$data);
        $_SESSION['LoginInvalid'] = $result;
        return $result;
    }
    
    public function updateUser($data) {
        
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
