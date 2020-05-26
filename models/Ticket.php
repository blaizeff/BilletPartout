<?php
include_once 'DB.php';
class Ticket {
    private $DB;
    private $table = "Billets";
    public function __construct()
    {
        $this->DB = new DB();
    }

    public function get(int $idEvent,int $idShow) {
        return array_values($this->DB->getFunction('getBillet('.$idEvent.','.$idShow.')')[0])[0];
    }
}