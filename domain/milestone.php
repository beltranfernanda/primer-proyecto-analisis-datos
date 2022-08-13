<?php

class Milestone {
    private $name; //string
    private $deadline; //DateTime

    function __construct($name, $deadline) {
        $this->name = $name;
        $this->deadline = new DateTime($deadline);
    }

    public function getName() {
        return $this->name;
    }

    public function getDeadline() {
        return $this->deadline->format(DateTime::ATOM);
    }
    
}

?>