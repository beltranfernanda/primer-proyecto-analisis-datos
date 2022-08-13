<?php

class Task {
    private $name; //string
    private $start; //DateTime
    private $end; //DateTime
    private $milestone; //Milestone
    private $subtasks; //Subtask[]

    function __construct($name, $start, $end, $milestone, $subtasks) {
        $this->name = $name;
        $this->start = new DateTime($start);
        $this->end = new DateTime($end);
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
    
}

?>