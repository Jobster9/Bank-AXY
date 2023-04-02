<?php
// Specify database credentials here
$host = 'EMILYSPC\MSSQLSERVER1';
$dbname = 'BankAXY';
// Creating a new PDO connection object
$pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");