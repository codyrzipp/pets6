<?php
class Dog extends Pet {


    public function __construct($type = "Unknown", $color = "unknown", $name = "unknown")
    {
        parent::__construct($type, $color, $name);
    }

    function activity() {
        echo "<p>" . $this->getName() . " is fetching.</p>";
    }

    function talk()
    {
       echo $this->getName() . " is barking<br>";
    }
}