<?php
include_once 'DB.php';
class Show 
{
    private $DB;
    private $tableShow = "Spectacles";
    public function __construct()
    {
        $this->DB = new DB();
    }

    public function get($id) {
        return $this->DB->get($this->tableShow,$id);
    }
    public function getAllShow() {
        $DBresult = $this->DB->selectShow();
        $result = array();
        foreach ($DBresult as $item) {
            $item = Components::change_key($item,"idRepresentation","Id");
            $item = Components::change_key($item,"nomSpectacle","Title");
            $item = Components::change_key($item,"nomArtiste","Artist");
            $item = Components::change_key($item,"Adresse","Location");
            $item = Components::change_key($item,"Adresse","Location");
            $item = Components::change_key($item,"idSpectacle","IdShow");
            $result[] = $item;
        }
        return $result;
    }
}