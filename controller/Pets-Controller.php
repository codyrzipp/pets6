<?php

class PetController
{
    private $_f3; //router
    private $_val; //validation
    private $_cnxn;

    public function __construct($f3)
    {
        $this->_f3 = $f3;
        //$this->_val = new Validation();
        $this->_cnxn = new DataBase();
    }
    public function home()
    {
        echo "<h1>My Pets</h1>";
        echo "<a href='order'>Order a Pet</a>";
    }

    public function order()
    {
        $_SESSION = array();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->_f3->set("animal", $_POST["animal"]);
            if (validString($_POST["animal"])) {
                if ($_POST["animal"] == "dog") {
                    $_SESSION["animal"] = new Dog("dog", "", "");
                } else if ($_POST["animal"] == "cat") {
                    $_SESSION["animal"] = new Cat("cat", "", "");
                } else if ($_POST["animal"] == "bird") {
                    $_SESSION["animal"] = new Bird("bird", "", "");
                    $_SESSION["animal"]->setSize("large");
                } else {
                    $_SESSION["animal"] = new Pet($_POST["animal"], "", "");
                }

                $this->_f3->reroute("/order2");
            } else {
                $this->_f3->set("errors['animal']", "Please enter an animal.");
            }
        }
        $view = new Template();
        echo $view->render('views/form1.html');
    }

    public function order2()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->_f3->set("color", $_POST["color"]);
            if (validString($_POST['name'])) {
                $_SESSION['animal']->setName($_POST["name"]);

                if (validColor($_POST["color"])) {
                    $_SESSION["animal"]->setColor($_POST["color"]);
                    $this->_f3->reroute("/results");
                } else {
                    $this->_f3->set("errors['color']", "Please enter an valid color.");
                }
            }
        }
        $view = new Template();
        echo $view->render('views/form2.html');
    }

    public function show() {

        if ($this->_cnxn) {
            $this->_f3->set("allPets", $this->_cnxn->allPets());
        } else {
            $this->_f3->set("allPets", "set");
        }


        $view = new Template();
        echo $view->render('views/show.html');
    }

    public function result()
    {
        if ($this->_cnxn->addPet($_SESSION["animal"])) {
            $view = new Template();
            echo $view->render("views/results.html");
        } else {
            echo "something went wrong";
            echo "<a href='order'>Try Again</a>";
        }


    }
}