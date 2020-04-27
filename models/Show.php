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
        $result= $this->DB->getWhere($this->tableShow,"idSpectacle",$id);
            $result = Components::change_key($result,"idSpectacle","idShow");
            $result = Components::change_key($result,"nomSpectacle","title");
            $result = Components::change_key($result,"nomArtiste","artist");
            $result = Components::change_key($result,"Adresse","location");
            $result = Components::change_key($result,"idCategories","idCat");
        return $result;
    }
    public function getAllShow() {
        $DBresult = $this->DB->selectShow();
        $result = array();
        foreach ($DBresult as $item) {
            $item = Components::change_key($item,"idRepresentation","id");
            $item = Components::change_key($item,"nomSpectacle","title");
            $item = Components::change_key($item,"nomArtiste","artist");
            $item = Components::change_key($item,"Adresse","location");
            $item = Components::change_key($item,"idSpectacle","idShow");
            $item = Components::change_key($item,"idCategories","idCat");

            $result[] = $item;
        }
        return $result;
    }

    public function selectAll() {
        $DBresult = $this->DB->selectAll($this->tableShow);
        $result = array();
        foreach ($DBresult as $item) {
            $item = Components::change_key($item,"idSpectacle","idShow");
            $item = Components::change_key($item,"nomSpectacle","title");
            $item = Components::change_key($item,"nomArtiste","artist");
            $item = Components::change_key($item,"Adresse","location");
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
    public function create($title,$desc,$artist,$category) {
        $data = [
            "nomSpectacle" => $title,
            "description" => $desc,
            "idCategories" => $category,
            "nomArtiste" => $artist,
        ];
        return $this->DB->create($this->tableShow,$data);
    }

    public function update($id,$title,$desc,$artist,$category) {
        $data = [
            "nomSpectacle" => $title,
            "description" => $desc,
            "idCategories" => $category,
            "nomArtiste" => $artist,
        ];
        return $this->DB->update($this->tableShow,$id,$data,"idSpectacle");
    }


    public static function showCategory($id = "",$selectedId="")
    {
        require_once("./models/Show.php");

        $show = new Show();
        $categories = $show->getAllCategory();
        $html = "<select id=\"$id\" class=\"form-control browser-default customSelect custom-select\" name='showCategory'>";
        foreach ($categories as $item) {
            $html .= "<option value='" . $item["id"] ."'";
            if ($selectedId == $item["id"]) {
                $html .= " selected";
            }
            $html .= ">" . $item["value"] . "</option>";
        }
        $html .= "</select>";
        return $html;
    }    
}