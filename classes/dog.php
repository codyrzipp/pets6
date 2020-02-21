<?php
class Dog extends Pet {

    function activity() {
        echo "<p>" . $this->getName() . " is fetching.</p>";
    }

    function talk()
    {
       echo $this->getName() . " is barking<br>";
    }
}