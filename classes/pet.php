<?php

class Pet {
    private $_name;
    private $_color;
    private $_type;

    //parameterized constructor
    function __construct($type="Unknown", $color="unknown", $name="unknown") {
        $this->_type = $type;
        $this->_color = $color;
        $this->_name = $name;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->_type = $type;
    }
    function eat() {
        echo $this->_name . " is eating.<br>";
    }

    function talk() {
        echo "Pet is talking<br>";
    }

    function getName() {
        return $this->_name;
    }

    function getColor() {
        return $this->_color;
    }

    function setName ($name) {
        $this->_name = $name;
    }

    function setColor ($color) {
        $this->_color = $color;
    }
}