<?php

class Subtask {
    private $name; //string
    private $start; //DateTime
    private $end; //DateTime

    function __construct($name, $start, $end) {
        $this->name = $name;
        $this->start = new DateTime($start);
        $this->end = new DateTime($end);
    }

    public function getName() {
        return $this->name;
    }

    public function getStart() {
        return $this->start->format(DateTime::ATOM);
    }

    public function getEnd() {
        return $this->end->format(DateTime::ATOM);
    }
    
}

?>