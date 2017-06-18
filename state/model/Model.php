<?php
class Model{

    private static $conn;
    
    private function __construct() {

    }

    public static function getConn() {
        
        if(empty(SELF::$conn)) {

            $conn = new PDO("mysql:host=localhost;dbname=test","root","");
            $conn->query("SET CHARSET utf8");
            SELF::$conn  = $conn;

        }  
        return SELF::$conn;
    }

    public static function query($sql) {

        SELF::getConn();
        $data = array();
        $res = SELF::$conn->query($sql, PDO::FETCH_ASSOC);

        while ($row = $res->fetch() ) {
            $data[]= $row;
        }
        return $data;

    }

    public static function save($sql) {
    
        SELF::getConn();
        if(SELF::$conn->exec($sql) ){
            return true;
        }

        return false;
    
    }

}



