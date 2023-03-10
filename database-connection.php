<!doctype html>
<html lang="en">
<head></head>

<!-- Stage 1 -->
<?php phpinfo(); ?>

<!-- Stage 2 -->
<?php
/*
$result = insertToDatabase();
function insertToDatabase()
{
    $status = true;
    // Set up connection parameters
    $serverName = "DESKTOP-AVCNUEK"; // Change to your server name
    $connectionInfo = array(
        "Database" => "testdatabase",
    );
    // Connect to database
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    if ($conn === false) {
        // Handle connection error
        print_r(sqlsrv_errors());
        $status = false;
    }
    // Define SQL statement for inserting record
    $sql = "INSERT INTO mytable (mycolumn) VALUES (?)";
    // Prepare the SQL statement
    $stmt = sqlsrv_prepare($conn, $sql, array("successful value added"));
    if ($stmt === false) {
        // Handle statement preparation error
        print_r(sqlsrv_errors());
        $status = false;
    }
    // Execute the prepared statement
    if (sqlsrv_execute($stmt) === false) {
        // Handle statement execution error
        print_r(sqlsrv_errors());
        $status = false;
    }
    // Close the statement and connection
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
    return $status;
}
?>
<body>
<h1><?php if ($result) {
    echo ("successful insertion");
} else {
    echo ("insertion failed");
    if (!is_null(sqlsrv_errors())) {
        echo (print_r(sqlsrv_errors()));
    }
    ;
} ?> </h1>
</body>