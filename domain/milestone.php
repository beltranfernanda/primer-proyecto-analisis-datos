<?php

class Milestone implements JsonSerializable {
    private $name; //string
    private $deadline; //DateTime

    function __construct($name, $deadline) {
        $this->name = $name;
        $this->deadline = DateTime::createFromFormat('d/m/y', $deadline);
    }

    public function getName() {
        return $this->name;
    }

    public function getDeadline() {
        return $this->deadline->format(DateTime::ATOM);
    }

    public function jsonSerialize() {
        return [
            'name' => $this->getName(),
            'deadline' => $this->getDeadline(),
        ];
    }
    
}

?>