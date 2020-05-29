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

    public function get($id)
    {
        $result = $this->DB->getWhere($this->table, "idSpectacle", $id);
        $result = Components::change_key($result, "idSpectacle", "idShow");
        $result = Components::change_key($result, "nomSpectacle", "title");
        $result = Components::change_key($result, "nomArtiste", "artist");
        $result = Components::change_key($result, "Adresse", "location");
        $result = Components::change_key($result, "idCategories", "idCat");
        $result = Components::change_key($result, "prix_de_base", "basePrice");
        return $result;
    }

    public function getAllShow($filter)
    {
        $DBresult = $this->DB->selectShow($filter);
        $keys = [
            "idRepresentation" => "id",
            "nomSpectacle" => "title",
            "nomArtiste" => "artist",
            "Adresse" => "location",
            "idSpectacle" => "idShow",
            "idCategories" => "idCat",
            "nomSalle" => "venueName",
            "Description" => "categorie",
            "prix_de_base" => "basePrice"
        ];
        return Components::change_arrayKeys($DBresult, $keys);
    }

    public function getEventWhere($idEvent,$column='idRepresentation')
    {
        $DBresult = $this->DB->getEvent($idEvent,$column);
        $keys = [
            "idRepresentation" => "id",
            "idSpectacle" => "idShow",
            "nomSpectacle" => "title",
            "nomArtiste" => "artist",
            "Adresse" => "venueLocation",
            "Description" => "categorie",
            "description" => "description",
            "nomSalle" => "venueName",
            "idSalle"=>"locationId",
        ];
        return Components::change_arrayKeys($DBresult, $keys);
    }

    public function getSection($sectionId)
    {
        $DBresult = $this->DB->getWhere('Sections', 'idSection', $sectionId);
        
        $DBresult = Components::change_key($DBresult, "idSalle", "idVenue");
        $DBresult = Components::change_key($DBresult, "couleur", "color");
        $DBresult = Components::change_key($DBresult, "fm_prix", "priceMultiplier");
        $DBresult = Components::change_key($DBresult, "nomSection", "name");
        return $DBresult;
    }
    public function selectAll()
    {
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

    public function getAllCategory()
    {
        $DBresult = $this->DB->selectAll("Categories");
        $keys = [
            "idCategories" => "id",
            "Description" => "value",
        ];
        return Components::change_arrayKeys($DBresult, $keys);
    }

    public function create($title, $desc, $artist, $category,$basePrice)
    {
        $data = [
            "nomSpectacle" => $title,
            "description" => $desc,
            "idCategories" => $category,
            "nomArtiste" => $artist,
            "prix_de_base"=> $basePrice,
        ];
        return $this->DB->create($this->table, $data);
    }

    public function update($id, $title, $desc, $artist, $category,$basePrice)
    {
        $data = [
            "nomSpectacle" => $title,
            "description" => $desc,
            "idCategories" => $category,
            "nomArtiste" => $artist,
            "prix_de_base"=> $basePrice,
        ];
        return $this->DB->update($this->table, $id, $data, "idSpectacle");
    }


    public static function showCategory($id = "", $selectedId = "")
    {
        require_once("./models/Show.php");

        $show = new Show();
        $categories = $show->getAllCategory();
        $html = "<select id=\"$id\" class=\"form-control browser-default customSelect custom-select\" name='showCategory'>";
        foreach ($categories as $item) {
            $html .= "<option value='" . $item["id"] . "'";
            if ($selectedId == $item["id"]) {
                $html .= " selected";
            }
            $html .= ">" . $item["value"] . "</option>";
        }
        $html .= "</select>";
        return $html;
    }

    public function delete($id) {
        $this->DB->deleteWhere($this->table,'idSpectacle',$id);
    }

    public function addEvent($idLocation,$date,$idEvent) {
        $this->DB->create("Representation",["idSalle"=>$idLocation,"Date"=>$date,"idSpectacle"=>$idEvent]);
    }
    public function updateEvent($id,$data) {
        $data = Components::change_key($data, "name", "idSalle");
        $data = Components::change_key($data, "date", "Date");
        $data = Components::change_key($data, "locationId", "idSalle");
        $this->DB->update("Representation",$id,$data,"idRepresentation");
    }
    public function deleteEvent($id) {
        $this->DB->deleteWhere("Representation","idRepresentation",$id);
    }
}
