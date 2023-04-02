<?php
// Specify database credentials here
$host = 'LAPTOP-B9IKBMD8';
$dbname = 'BankAXY';
// Creating a new PDO connection object
$pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");