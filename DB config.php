<?php

// Specify your database credentials here
$host = 'ABDULNAZIR';
$dbname = 'BankAXY';

// Create a new PDO connection object
$pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");