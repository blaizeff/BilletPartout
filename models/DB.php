<?php
class DB
{
    public static $username = "equipe22";
    public static $password = "in8vest22";
    public static $dsn = "mysql:host=167.114.152.54;dbname=dbequipe22;charset=utf8mb4";
    private $pdo;


    public function __construct()
    {
        $this->pdo = new PDO($this::$dsn, $this::$username, $this::$password);
    }

    public function get($table, $id)
    {
        //ATTENTION: le get ne fonctionne pas de base avec la majorite des tables: la solution c'est getWhere() ou getUserByID() si tu veux un user
        $stm = $this->pdo->prepare('SELECT * FROM ' . $table . ' WHERE `id` = :id');
        $stm->bindValue(':id', $id);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }

    public function getUserByID($table, $id)
    {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $table . ' WHERE `idClient` = :id');
        $stm->bindValue(':id', $id);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }

    public function getWhere($table,$column,$value)
    {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $table . ' WHERE  ' . $column . '= :value');
        $stm->bindValue(':value', $value);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }

    public function selectAll($table)
    {
        $stm = $this->pdo->prepare('SELECT * FROM ' . $table);
        $success = $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $rows : [];
    }

    public function create($table, $data)
    {
        $columns = array_keys($data);
        $columnSql = implode(',', $columns);
        $bindingSql = ':' . implode(',:', $columns);
        $sql = "INSERT INTO $table ($columnSql) VALUES ($bindingSql)";
        $stm = $this->pdo->prepare($sql);
        foreach ($data as $key => $value) {
            $stm->bindValue(':' . $key, $value);
        }
        $status = $stm->execute();
        return ($status) ? $this->pdo->lastInsertId() : false;
    }

    public function update($table,$id, $data,$idName='id')
    {
        if (isset($data['id']))
            unset($data['id']);
        $columns = array_keys($data);
        $columns = array_map(function ($item) {
            return $item . '=:' . $item;
        }, $columns);
        $bindingSql = implode(',', $columns);
        $sql = "UPDATE $table SET $bindingSql WHERE `$idName` = :id";
        $stm = $this->pdo->prepare($sql);
        $data['id'] = $id;
        foreach ($data as $key => $value) {
            $stm->bindValue(':' . $key, $value);
        }
        $status = $stm->execute();
        return $status;
    }

    public function delete($table, $id)
    {
        $stm = $this->pdo->prepare('DELETE FROM ' . $table . ' WHERE id = :id');
        $stm->bindParam(':id', $id);
        $success = $stm->execute();
        return ($success);
    }

    public function selectShow($filter)
    {
        $sqlString = 'Select s.idSpectacle,r.idRepresentation,s.idCategories,s.nomSpectacle,s.nomArtiste,sa.Adresse,r.Date,s.description from Spectacles s join Representation r on s.idSpectacle=r.idSpectacle join Salles sa on r.idSalle=sa.idSalle';

        //If Id is set then find with id else show all 
        //By default its show future show 
        if (array_key_exists('id',$filter) && $filter['id'] != '') {
            $sqlString .= ' WHERE s.idSpectacle = :id';
        } else {
            $sqlString .= ' WHERE r.date > CURDATE()';
        }

        if (array_key_exists('search',$filter) && $filter['search'] != '') {
            $filter['search'] = '%'.$filter['search'].'%';
            $sqlString .= ' AND (s.nomSpectacle like :search 
                            OR s.description like :search
                            OR s.nomArtiste like :search)';
        }
        
        $sqlString .= " ORDER BY ";
        if (array_key_exists('order',$filter) && $filter['order'] != '') {
            if ($filter['order'] == 'nameA-Z') {
                $sqlString .="s.nomSpectacle ASC,r.date ASC";
            } else if ($filter['order'] == 'nameZ-A') {
                $sqlString .="s.nomSpectacle DESC,r.date ASC";
            } 
        } else {
            $sqlString .= "r.date ASC";
        }
        //Prepare
        $stm = $this->pdo->prepare($sqlString);


        //BIND
        if (array_key_exists('id',$filter) && $filter['id'] != '') {
            $stm->bindValue(':id', $filter['id']);
        }
        if (array_key_exists('search',$filter) && $filter['search'] != '') {
            $stm->bindValue(':search', $filter['search']);
        }
        $success = $stm->execute();
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }
}
