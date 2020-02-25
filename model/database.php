<?php
require ("../../../connection.php");
class DataBase {
    private $_cnxn;

    function __construct()
    {
        try {
            //CREATING A NEW PDO CONNECTION
            $this->_cnxn = new PDO("mysql:dbname=rcoxgree_grc", DB_USERNAME, DB_PASSWORD);
            //if there is an error, print error message
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function allPets() {
        $sql = "SELECT * FROM pets";
        $statement = $this->_cnxn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        //do the steps from class skip binding params
        return $result;
    }

    function addPet($newPet) {
        $name = $newPet->getName();
        $color = $newPet->getColor();
        $type = $newPet->getType();
        $sql = "INSERT INTO pets (petName, petColor, petType)
                VALUES ('$name', '$color', '$type')";
        $statement = $this->_cnxn->prepare($sql);
        return $statement->execute();
        //$result = $statement->fetchAll(PDO::FETCH_ASSOC);
        //do the steps from class skip binding params
        //$result;
    }
}
