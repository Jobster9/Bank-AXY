<?php

// Specify your database credentials here
$host = 'EMILYSPC\MSSQLSERVER1';
$dbname = 'BankAXY';

// Create a new PDO connection object
$pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");


// Names
define("BANKNAME", "AXY Bank");


//SQL strings
//roles
define("ADMIN_ROLE", "Admin");
define("STAFF_ROLE", "Staff");
define("HEAD_OFFICE_ROLE", "Head Office");

//branches
define("HEAD_OFFICE", "Kuala Lumpur");
define("EAST_BRANCH", "Kuching");

//departments
define("LOANS_DEP", "Loans");
define("MORTGAGES_DEP", "Mortgage Advice");
define("ADMIN_DEP", "Administration");
define("ACCOUNTS_DEP", "Accounts");
?>