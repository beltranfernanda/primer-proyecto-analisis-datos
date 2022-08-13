<?php

include ('domain/milestone.php');
include ('domain/subtask.php');
include ('domain/task.php');
include ('domain/scheduleDTO.php');
include ('utils/csvParser.php');

class Schedule {

    private $FILENAME = "02_CronogramActs-b.csv";

    public function getProgrammedActivites() {
        $data = CsvParser::readCsv("02_CronogramActs-b.csv");
        $programmed_data = $data[2];

        $title = $programmed_data[1]." - ".$programmed_data[2];
        $start = $programmed_data[4];
        $end = $programmed_data[5];
        $milestone = new Milestone($data[0][21], $programmed_data[21]);
        $subtasks = [];

        for ($i = 6; $i <= count($programmed_data)-2; $i=$i+3) {
            $name = $data[0][$i]." - ".$programmed_data[$i+2];
            $startSubtask = $programmed_data[$i];
            $endSubtask = $programmed_data[$i+1];
            $subtask = new Subtask($name, $startSubtask, $endSubtask);
            array_push($subtasks, $subtask);
        }

        $task = new Task($title, $start, $end, $milestone, $subtasks);
        
        return $task;
    }

    public function getRealActivities() {
        $data = CsvParser::readCsv("02_CronogramActs-b.csv");
        $real_data = $data[3];

        $title = $data[2][1]." - ".$data[2][2];
        $start = $real_data[4];
        $end = $real_data[5];
        $milestone = new Milestone($data[0][21], $real_data[21]);
        $subtasks = [];

        for ($i = 6; $i <= count($real_data)-2; $i=$i+3) {
            $name = $data[0][$i]." - ".$real_data[$i+2];
            $startSubtask = $real_data[$i];
            $endSubtask = $real_data[$i+1];
            $subtask = new Subtask($name, $startSubtask, $endSubtask);
            array_push($subtasks, $subtask);
        }

        $task = new Task($title, $start, $end, $milestone, $subtasks);
        
        return $task;
    }

    public function getScheduleDTO(){
        return new ScheduleDTO($this->getProgrammedActivites(), $this->getRealActivities());
    }

}

?>