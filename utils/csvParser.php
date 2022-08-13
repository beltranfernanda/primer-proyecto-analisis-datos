<?php

class CsvParser {

    public static function readCsv($filename) {
        $data = [];
        $CSVfp = fopen($filename, "r");
        if ($CSVfp !== FALSE) {
            while (! feof($CSVfp)) {
                $row = fgetcsv($CSVfp, 1000, ",");
                array_push($data, $row);
            }
        }
        fclose($CSVfp);
        return $data;
    }
}

?>