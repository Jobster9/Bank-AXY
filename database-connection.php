<!doctype html>
<html lang="en">
<head></head>

<!-- Stage 1 -->
<?php //phpinfo(); ?>

<!-- Stage 2 -->
<?php

$checkFunction = insertToDatabase();

insertToDatabase(){

    $success = true;
    // Set up connection parameters
    $serverName = "DESKTOP-AVCNUEK"; // Change to your server name
    $connectionInfo = array(
    "Database" => "testdatabase",
    );

    // Connect to database
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn === false) {
        // Handle connection error
        die(print_r(sqlsrv_errors(), true));
    }

    // Define SQL statement for inserting record
    $sql = "INSERT INTO mytable (mycolumn) VALUES (?)";

    // Prepare the SQL statement
    $stmt = sqlsrv_prepare($conn, $sql, array("successful value added"));

    if ($stmt === false) {
        // Handle statement preparation error
        die(print_r(sqlsrv_errors(), true));
        $success = false;
    }

    // Execute the prepared statement
    if (sqlsrv_execute($stmt) === false) {
        // Handle statement execution error
        die(print_r(sqlsrv_errors(), true));
        $success = false;
    }

    // Close the statement and connection
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
    return success;
}
?>


<body>
<h1><?php if($checkFunction){ echo ("successful insertion");}else{echo ("insertion failed");} ?> </h1>
</body>