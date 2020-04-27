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
        $stm = $this->pdo->prepare('SELECT * FROM ' . $table . ' WHERE `id` = :id');
        $stm->bindValue(':id', $id);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }

    public function getWhere($table, $column, $value)
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

    public function selectShow($id = '')
    {
        $sqlString = 'Select s.idSpectacle,r.idRepresentation,s.idCategories,s.nomSpectacle,s.nomArtiste,sa.Adresse,r.Date,s.description from Spectacles s join Representation r on s.idSpectacle=r.idSpectacle join Salles sa on r.idSalle=sa.idSalle';
        if ($id != '') {
            $sqlString .= ' where s.idSpectacle = :id';
        }

        $stm = $this->pdo->prepare($sqlString);
        if ($id != '') {
            $stm->bindValue(':id', $id);
        }
        $success = $stm->execute();
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }
}
