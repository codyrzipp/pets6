<?php
require ("../../../connection.php");
class DataBase {
    private $_cnxn;

    function __construct()
    {
        try {
            //CREATING A NEW PDO CONNECTION
            $this->_cnxn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //if there is an error, print error message
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}