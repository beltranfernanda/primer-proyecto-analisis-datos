<?php

class Subtask implements JsonSerializable {
    private $name; //string
    private $start; //string (date ISO string)
    private $end; //string (date ISO string)

    function __construct($name, $start, $end) {
        $this->name = $name;
        $this->start = $this->validateDate($start);
        $this->end = $this->validateDate($end);
    }

    public function getName() {
        return $this->name;
    }

    public function getStart() {
        return $this->start;
    }
    
    public function getEnd() {
        return $this->end;
    }
    
    public function jsonSerialize() {
        return [
            'name' => $this->getName(),
            'start' => $this->getStart(),
            'end' => $this->getEnd()
        ];
    }

    private function validateDate($strDate) {
        if($strDate == "NA" || $strDate == "") {
            return null;
        }
        $temp = DateTime::createFromFormat('d/m/y', $strDate);
        return $temp->format(DateTime::ATOM);
    }
    
}

?>