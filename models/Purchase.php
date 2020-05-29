<?php
include_once 'DB.php';
class Show
{
    private $DB;
    private $table = "Spectacles";
    public function __construct()
    {
        $this->DB = new DB();
    }

    public function getFidelityList($id)
    {
        $result = $this->DB->getWhere($this->table, "idSpectacle", $id);
        $result = Components::change_key($result, "idSpectacle", "idShow");
        $result = Components::change_key($result, "nomSpectacle", "title");
        $result = Components::change_key($result, "nomArtiste", "artist");
        $result = Components::change_key($result, "Adresse", "location");
        $result = Components::change_key($result, "idCategories", "idCat");
        return $result;
    }
}
