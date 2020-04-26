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
            $item = Components::change_key($item,"idSpectacle","IdShow");
            $item = Components::change_key($item,"idCategories","idCat");

            $result[] = $item;
        }
        return $result;
    }
    public function selectAll() {
        $DBresult = $this->DB->selectAll($this->tableShow);
        $result = array();
        foreach ($DBresult as $item) {
            $item = Components::change_key($item,"idSpectacle","IdShow");
            $item = Components::change_key($item,"nomSpectacle","Title");
            $item = Components::change_key($item,"nomArtiste","Artist");
            $item = Components::change_key($item,"Adresse","Location");
            $item = Components::change_key($item,"idCategories","idCat");
            $result[] = $item;
        }
        return $result;
    }
    public function getAllCategory() {
        $DBresult = $this->DB->selectAll("Categories");
        $result = array();
        foreach ($DBresult as $item) {
            $item = Components::change_key($item,"idCategories","id");
            $item = Components::change_key($item,"Description","value");
            $result[] = $item;
        }
        return $result;
    }
    public function CreateShow($title,$desc,$artist,$category) {
        $data = [
            "nomSpectacle" => $title,
            "description" => $desc,
            "idCategories" => $category,
            "nomArtiste" => $artist,
        ];
        return $this->DB->create($this->tableShow,$data);
    }


    public static function showCategory($id = "")
    {
        require_once("./models/Show.php");

        $show = new Show();
        $categories = $show->getAllCategory();
        $html = "<select id=\"$id\" class=\"form-control browser-default customSelect custom-select\" name='showCategory'>";
        foreach ($categories as $item) {
            $html .= "<option value='" . $item["id"] . "'>" . $item["value"] . "</option>";
        }
        $html .= "</select>";
        return $html;
    }
}