<?php
class Cat extends Pet {


    public function __construct($type = "Unknown", $color = "unknown", $name = "unknown")
    {
        parent::__construct($type, $color, $name);
    }

    function activity() {
        echo "<p>" . $this->getName() . " plotting your downfall.</p>";
    }

    function talk()
    {
        echo $this->getName() . " is meowing<br>";
    }
}