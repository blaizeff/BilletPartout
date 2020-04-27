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

    public function get($id) {
        $result= $this->DB->getWhere($this->table,"idSalle",$id);
            $result = Components::change_key($result,"idSalle","id");
            $result = Components::change_key($result,"Adresse","address");
            $result = Components::change_key($result,"NomSalle","name");
        return $result;
    }
    
    public function selectAll() {
        $DBresult = $this->DB->selectAll($this->table);
        $result = array();
        foreach ($DBresult as $item) {
            $item = Components::change_key($item,"idSalle","id");
            $item = Components::change_key($item,"Adresse","address");

            $item = Components::change_key($item,"NomSalle","name");

            $result[] = $item;
        }
        return $result;
    }

    public function create($title,$address) {
        $data = [
            "NomSalle" => $title,
            "Adresse" => $address,
        ];
        return $this->DB->create($this->table,$data);
    }

    public function update($id,$title,$address) {
        $data = [
            "NomSalle" => $title,
            "Adresse" => $address,
        ];
        return $this->DB->update($this->table,$id,$data,"idSalle");
    }
}