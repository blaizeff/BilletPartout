<?php
class DB
{
    //http://167.114.152.54/phpadmin/
    public static $host = "167.114.152.54";
    public static $dbName = "dbequipe22";
    public static $username = "equipe22";
    public static $password = "in8vest22";

    private static function connect()
    {
        $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8", self::$username, self::$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    /*IMPORTANT: Instead querry, we need to use methods that call procedures
        EXAMPLE:
        public static function createUser($firstName,$lastName,$password) {
            
        }
        */

    public static function query($query, $params = array())
    {
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        $data = $statement->fetchAll();
        return $data;
    }
}
?>