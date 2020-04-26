<?php
include_once 'DB.php';
class User
{

    private $idCLient;
    private $nomFamClient;
    private $adresseClient;
    private $courrielClient;
    private $mdpClient;
    private $ccClient;
    private $admin;


    //getters and setters
    public function get_id(){
        return $this->idCLient;
    }

    private function set_id($id){
        $this->idCLient = $id;
    }

    public function get_nom(){
        return $this->nomFamClient;
    }

    private function set_nom($nom){
        $this->nomFamClient = $nom;
    }

    public function get_adresse(){
        return $this->adresseClient;
    }

    private function set_adresse($adr){
        $this->adresseClient = $adr;
    }

    public function get_courriel(){
        return $this->courrielClient;
    }

    private function set_courriel($courriel){
        $this->courrielClient = $courriel;
    }

    private $DB;
    private $table = "Clients";
    public function __construct()
    {
        $this->DB = new DB();
    }

    public function loadUser($id)
    {
        $table = $this->get($id);

        $this->idCLient = $table["idClient"];
        //not finished obvi

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
    public static function errorMessage($data)
    {
        if (isset($data) && array_key_exists('LoginInvalid',$data)) {
            $temp = $data['LoginInvalid'];
            $data['LoginInvalid']='';
            return $temp;
        }
        return "";
    }
}