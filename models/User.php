<?php
include_once 'DB.php';
class User
{

    private $idCLient;
    private $nomClient;
    private $adresseClient;
    private $courrielClient;
    private $mdpClient;
    private $ccClient;
    private $admin;
    private $numTelephone;


    //getters and setters
    public function get_id(){
        return $this->idCLient;
    }

    private function set_id($id){
        $this->idCLient = $id;
    }

    public function get_nom(){
        return $this->nomClient;
    }

    private function set_nom($nom){
        $this->nomClient = $nom;
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

    public function get_telephone(){
        return $this->numTelephone;
    }

    private function set_telephone($telephone){
        $this->numTelephone = $telephone;
    }

    public function get_mdp(){
        return $this->mdpClient;
    }

    private function set_mdp($hashedPass){
        $this->mdpClient = $hashedPass;
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
        $this->nomClient = $table["nomClient"];
        $this->adresseClient = $table["Adresse"];
        $this->courrielClient = $table["Courriel"];
        $this->admin = $table["Admin"];
        $this->numTelephone = $table["numTelephone"];
    }

    public function get($id) {
        return $this->DB->getUserByID($this->table,$id);
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

    public function updateUserProfile($idClient, $data)
    {
        $result = $this->DB->update("Clients", $idClient, $data, "idClient");
        return $result;
    }
    public function updateUserPassword($idClient,$newPassHashed)
    {
        $data = [
            "mot_de_passe" => $newPassHashed
        ];


        $result = $this->DB->update("Clients", $idClient, $data, "idClient");
        return $result;


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