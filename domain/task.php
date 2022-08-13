<?php

class Task implements JsonSerializable {
    private $name; //string
    private $start; //DateTime
    private $end; //DateTime
    private $milestone; //Milestone
    private $subtasks; //Subtask[]

    function __construct($name, $start, $end, $milestone, $subtasks) {
        $this->name = $name;
        $this->start = DateTime::createFromFormat('d/m/y', $start);
        $this->end = DateTime::createFromFormat('d/m/y', $end);
        $this->milestone = $milestone;
        $this->subtasks = $subtasks;
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
    
    public function getMilestone() {
        return $this->milestone;
    }

    public function getSubtasks() {
        return $this->subtasks;
    }
    
    public function jsonSerialize() {
        return [
            'name' => $this->getName(),
            'start' => $this->getStart(),
            'end' => $this->getEnd(),
            'milestone' => $this->getMilestone(),
            'subtasks' => $this->getSubtasks(),
        ];
    }
}

?>