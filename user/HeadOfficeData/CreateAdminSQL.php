<?php

function CreateAdmin (){

    // Create a new PDO connection object
    include("../../DB config.php");

    date_default_timezone_set('Europe/London');

    $stmt = $pdo->prepare('INSERT INTO Bank_Employees (User_ID, User_Role, First_Name, Last_Name, Email, Password, Last_Active, Branch, Department) VALUES (:User_ID, :role, :fname, :lname, :email, :password, :active, :branch, :department)');

    $rand = rand(100, 999);

    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $branch = $_POST['branch'];
    $department = $_POST['department'];

    $active = date('d/m/Y H:i');

    $role = "Admin";
    $User_ID = strtoupper(substr($fname, 0 ,1) . substr($lname, 0, 1). "001_". $rand);


    $stmt->bindParam(':User_ID', $UserID, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, SQLITE3_TEXT);
    $stmt->bindParam(':fname', $fname, SQLITE3_TEXT);
    $stmt->bindParam(':lname', $lname, SQLITE3_TEXT);
    $stmt->bindParam(':email', $email, SQLITE3_TEXT);
    $stmt->bindParam(':password', $password, SQLITE3_TEXT);
    $stmt->bindParam(':active',  $active, SQLITE3_TEXT);
    $stmt->bindParam(':branch',  $branch, SQLITE3_TEXT);
    $stmt->bindParam(':department',  $department, SQLITE3_TEXT);


    $stmt->execute();

    return "yes";

}

function passwordCheck($password)
{
    $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    $passwordCheck = preg_match($password_regex, $password);

    return $passwordCheck;
}




?>
