<?php

// Specify your database credentials here
$host = 'EMILYSPC\MSSQLSERVER1';
$dbname = 'BankAXY';

// Create a new PDO connection object
$pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");

// EMILYSPC\MSSQLSERVER1