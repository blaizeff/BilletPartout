<?php
include_once 'DB.php';
class Purchase
{
    private $DB;
    private $table = "Spectacles";
    public function __construct()
    {
        $this->DB = new DB();
    }

    public function getFidelityList()
    {
        $result = $this->DB->getFidelity();
        $result = Components::change_key($result, "nomClient", "name");
        $result = Components::change_key($result, "courriel", "email");
        $result = Components::change_key($result, "nbAchats", "nb");
        return $result;
    }
}
