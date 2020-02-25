<?php
class Bird extends Pet {

    private $_size;

    function __construct($type = "Unknown", $color = "unknown", $name = "unknown", $size="unknown")
    {
        $this->_size = $size;
        parent::__construct($type, $color, $name);
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->_size;
    }

    function activity() {
        echo "<p>" . $this->getName() . " is fetching.</p>";
    }

    function talk()
    {
        echo "The " . $this->_size . " " . $this->getName() . " is making noise<br>";
    }

    function setSize($size) {
        $this->_size = $size;
    }
}