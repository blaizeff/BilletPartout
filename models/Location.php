<?php
include_once 'DB.php';
class Location
{
    private $DB;
    private $table = "Salles";
    public function __construct()
    {
        $this->DB = new DB();
    }

    public function get($id)
    {
        $result = $this->DB->getWhere($this->table, "idSalle", $id);
        $result = Components::change_key($result, "idSalle", "id");
        $result = Components::change_key($result, "Adresse", "address");
        $result = Components::change_key($result, "NomSalle", "name");
        return $result;
    }

    public function selectAll()
    {
        $DBresult = $this->DB->selectAll($this->table);
        $keys = [
            "idSalle" => "id",
            "Adresse" => "address",
            "NomSalle" => "name"
        ];
        return Components::change_arrayKeys($DBresult, $keys);
    }

    public function create($title, $address)
    {
        $data = [
            "NomSalle" => $title,
            "Adresse" => $address,
        ];
        return $this->DB->create($this->table, $data);
    }

    public function update($id, $title, $address)
    {
        $data = [
            "NomSalle" => $title,
            "Adresse" => $address,
        ];
        return $this->DB->update($this->table, $id, $data, "idSalle");
    }

    public function delete($id) {
        $this->DB->deleteWhere("Sections",'idSalle',$id);
        $this->DB->deleteWhere($this->table,'idSalle',$id);
    }

    public function getSections($id) {
        $result = ($this->DB->selectAllWhere("Sections","idSalle",$id));
        $keys = [
            "idSalle" => "idLocation",
            "Couleur" => "color",
            "fm_Prix" => "priceRatio",
            "nomSection" => "name",
            "capacite" => "capacity",
        ];
        return Components::change_arrayKeys($result, $keys);
    }
    public function addSection($id,$name,$priceRatio,$color,$capacity) {
        $data = [
            "idSalle"=>$id,
            "Couleur"=>$color,
            "fm_prix"=>$priceRatio,
            "nomSection"=>$name,
            "capacite"=>$capacity
        ];
        $this->DB->create("Sections",$data);
    }

    public function updateSection($id,$data) {
        $data =Components::change_key($data, "name", "NomSection");
        $data =Components::change_key($data, "idVenue", "idSalle");
        $data =Components::change_key($data, "priceRatio", "fm_prix");
        $data =Components::change_key($data, "color", "couleur");
        $data =Components::change_key($data, "capacity", "capacite");

        $this->DB->update("Sections",$id,$data,"idSection");
    }

    public function deleteSection($id) {
        $this->DB->deleteWhere("Sections",'idSection',$id);
    }
}
