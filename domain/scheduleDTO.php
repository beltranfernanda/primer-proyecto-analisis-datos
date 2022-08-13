<?php

class ScheduleDTO implements JsonSerializable {
    private $programmed; //task
    private $real; //task

    function __construct($programmed, $real) {
        $this->programmed = $programmed;
        $this->real = $real;
    }

    public function getProgrammed() {
        return $this->programmed;
    }

    public function getReal() {
        return $this->real;
    }

    public function jsonSerialize() {
        return [
            'programmed' => $this->getProgrammed(),
            'real' => $this->getReal(),
        ];
    }

}
?>