<?php
class Cat extends Pet {

    function activity() {
        echo "<p>" . $this->getName() . " plotting your downfall.</p>";
    }

    function talk()
    {
        echo $this->getName() . " is meowing<br>";
    }
}