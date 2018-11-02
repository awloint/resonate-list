<?php
ini_set('display_errors', 1);

    require 'pdo.php';

    //Select all the data of Registered user from the Database
    $registeredusers = $conn->query('SELECT * FROM resonate');

 
    $filename = "RegisteredUsers";        //File Name
    function cleanData(&$str)
    {
        if ($str == 't') {
            $str = 'TRUE';
        }
        if ($str == 'f') {
            $str = 'FALSE';
        }
        if (preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
            $str = "'$str";
        }
        if (strstr($str, '"')) {
            $str = '"' . str_replace('"', '""', $str) . '"';
        }
    }

// filename for download
$filename = "file_" . date('Ymd') . ".csv";
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: text/csv;");
$out = fopen("php://output", 'w');
$flag = false;

while ($row = $registeredusers->fetch(PDO::FETCH_ASSOC)) {
    if (!$flag) {
        // display field/column names as first row
        fputcsv($out, array_keys($row), ',', '"');
        $flag = true;
    }
    array_walk($row, 'cleanData');
    // insert data into database from here
    fputcsv($out, array_values($row), ',', '"');
}
fclose($out);
exit;
//end
