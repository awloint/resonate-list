<?php
ini_set('display_errors', 1);

require 'pdo.php';

//Select all the data of Registered user from the Database
$registeredusers = $conn->query('SELECT * FROM resonate');

//fetch the data
$data = $registeredusers->fetchAll();

//echo the data as JSON Data
echo json_encode($data);

