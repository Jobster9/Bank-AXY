<?php
// Specify database credentials here
$host = 'PLAYING-MINECRA';
$dbname = 'BankAXY';
// Creating a new PDO connection object
$pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");