<?php


// Specify database credentials here

$host = 'DESKTOP-AVCNUEK';

$dbname = 'BankAXY';

// Create a new PDO connection object
$pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");