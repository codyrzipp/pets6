<?php
class Bird extends Pet {

    private $_size;

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