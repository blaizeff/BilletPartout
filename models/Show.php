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

    public function get($id) {
        $result= $this->DB->getWhere($this->table,"idSpectacle",$id);
            $result = Components::change_key($result,"idSpectacle","idShow");
            $result = Components::change_key($result,"nomSpectacle","title");
            $result = Components::change_key($result,"nomArtiste","artist");
            $result = Components::change_key($result,"Adresse","location");
            $result = Components::change_key($result,"idCategories","idCat");
        return $result;
    }

    public function getAllShow() {
        $DBresult = $this->DB->selectShow();
        $keys = [
            "idRepresentation" => "id",
            "nomSpectacle" => "title",
            "nomArtiste" => "artist",
            "Adresse" => "location",
            "idSpectacle" => "idShow",
            "idCategories" => "idCat"
        ];
        return Components::change_arrayKeys($DBresult, $keys);
    }

    public function selectAll() {
        $DBresult = $this->DB->selectAll($this->table);
        $keys = [
            "idSpectacle" => "idShow",
            "nomSpectacle" => "title",
            "nomArtiste" => "artist",
            "Adresse" => "location",
            "idCategories" => "idCat"
        ];
        return Components::change_arrayKeys($DBresult, $keys);
    }

    public function getAllCategory() {
        $DBresult = $this->DB->selectAll("Categories");
        $keys = [
            "idCategories" => "id",
            "Description" => "value",
        ];
        return Components::change_arrayKeys($DBresult, $keys);
    }
    
    public function create($title,$desc,$artist,$category) {
        $data = [
            "nomSpectacle" => $title,
            "description" => $desc,
            "idCategories" => $category,
            "nomArtiste" => $artist,
        ];
        return $this->DB->create($this->table,$data);
    }

    public function update($id,$title,$desc,$artist,$category) {
        $data = [
            "nomSpectacle" => $title,
            "description" => $desc,
            "idCategories" => $category,
            "nomArtiste" => $artist,
        ];
        return $this->DB->update($this->table,$id,$data,"idSpectacle");
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